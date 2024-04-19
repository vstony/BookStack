<?php namespace BookStack\Util;

use BookStack\Entities\Models\Chapter;
use BookStack\Entities\Models\Page;
use BookStack\Exceptions\NotifyException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class YapiClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function parseInterfaceTag($html)
    {
        //标签[yapi_interface]8966[/yapi_interface]
        preg_match_all("/\[yapi_interface\](.*)\[\/yapi_interface\]/i", $html, $yapi);
        if ($yapi && count($yapi) > 1) {
            foreach ($yapi[1] as $interface_id) {
                if (is_numeric($interface_id)) {
                    $interfaceTagHtml = $this->getInterfaceTagHtml($interface_id);
                    $html = str_replace("[yapi_interface]" . $interface_id . "[/yapi_interface]", $interfaceTagHtml, $html);
                }
            }
            $html .= $this->getStyleScript();
        }
        return $html;
    }

    public static function changePageName($page)
    {
        YapiClient::clearYapiCache($page);

        if ($page->chapter_id > 0 && $page->book->name == "发版变更脚本记录") {
            $parent = $page->chapter()->first();
            $page = $page->forceFill([
                'name' => $parent->getRawAttribute("name") . "-" . date("Ymd")
            ]);
        }
        return $page;
    }

    public static function getDefaultPage($parent, $page)
    {
        if ($parent instanceof Chapter && $parent->name != "发版变更脚本记录" && $parent->book->name == "发版变更脚本记录") {
            $name = $parent->getOriginal("name") . "-" . date("Ymd");
            $page = Page::visible()->where("name", "=", $name)->first();
            if ($page) {
                $redirectLocation = "/books/" . $page->getOriginal("book_slug") . "/chapter/" . $parent->getOriginal("name");
                throw new NotifyException("页面 $name 已存在，请直接编辑", $redirectLocation);
            }

            $pageTemplate = Page::visible()->where("name", "=", '发版变更脚本模板')->first();
            $page = (new Page())->forceFill([
                'name'       => $name,
                'created_by' => user()->id,
                'owned_by'   => user()->id,
                'updated_by' => user()->id,
                'editor'     => 'markdown',
                'text'       => $pageTemplate->text,
                'html'       => $pageTemplate->html,
                'markdown'   => $pageTemplate->markdown,
                'draft'      => true,
            ]);
        }

        return $page;
    }

    public static function checkPageName($page, Request $request)
    {
        YapiClient::clearYapiCache($page);

        $parent = $page->chapter()->first();
        if ($parent instanceof Chapter && $parent->name != "发版变更脚本记录" && $parent->book->name == "发版变更脚本记录") {
            $chapter_name = $parent->getOriginal("name");
            $name = $request->name;
            $regx = "/$chapter_name-[0-9]{8}-.*/";
            $redirectLocation = $_SERVER["HTTP_REFERER"];
            if (!preg_match("/$chapter_name-[0-9]{8}$/", $name) && !preg_match($regx, $name)) {
                throw new NotifyException("名称 $name 不符合规范$regx", $redirectLocation);
            }
            $page = Page::visible()->where("name", "=", $name)->where("id", "!=", $page->id)->first();
            if ($page) {
                throw new NotifyException("页面 $name 已存在，请直接编辑", $redirectLocation);
            }
        }
    }

    private static function clearYapiCache($page)
    {
        preg_match_all("/\[yapi_interface\](.*)\[\/yapi_interface\]/i", $page->html, $yapi);
        if ($yapi && count($yapi) > 1) {
            foreach ($yapi[1] as $interface_id) {
                if (is_numeric($interface_id)) {
                    Cache::put('yapi_interface_' . $interface_id, null, 3600 * 24);
                }
            }
        }
    }

    private function login()
    {
        $params = array(
            "email"    => env("YAPI_USERNAME"),
            "password" => env("YAPI_PASSWORD"),
        );

        if (empty(env("YAPI_DOMAIN"))) {
            return false;
        }

        if (empty($params["email"]) || empty($params["password"])) {
            return false;
        }

        $url = env("YAPI_DOMAIN") . '/api/user/login';
        $headers = array(
            'Accept'         => 'application/json',
            'Accept-Charset' => 'utf-8'
        );
        $response = $this->client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json'    => $params
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['errcode'] == '0') {
            foreach ($response->getHeader("Set-Cookie") as $cookie) {
                preg_match_all('/(.*?)\=(.*?); path/is', $cookie, $result);
                $yapi_cookie[$result[1][0]] = $result[2][0];
            }
            Cache::put('yapi_cookie', $yapi_cookie, 3600 * 24);
            return true;
        } else {
            Cache::put('yapi_cookie', null, 3600 * 24);
            return false;
        }
    }

    private function echoYapiTable($api, $indent, &$toggleclass, $trclass)
    {
        $bool = array("0" => "否", "1" => "是");

        $html = "";
        if (!isset($api['properties'])) {
            return $html;
        }
        foreach ($api['properties'] as $key => $property) {
            $html .= "<tr class='" . $trclass . "'>";
            if ((array_key_exists("properties", $property) || array_key_exists("items", $property))) {
                $toggleclass .= $key;
                $html .= "<td onclick=\"toggle_tr(this, '" . $toggleclass . "')\" style='cursor:pointer'>" . $indent . "<span class='trapi-icon trapi-icon-expanded'></span><b>" . $key . "</b></td>";
            } else {
                $html .= "<td>" . $indent . $key . "</td>";
            }
            $html .= "<td>" . (array_key_exists("type", $property) ? $property['type'] : "") . "</td>";
            $html .= "<td>" . (array_key_exists("required", $api) ? $bool[in_array($key, $api['required'])] : $bool[0]) . "</td>";
            $html .= "<td style='font-size: 8px'>" . (array_key_exists("default", $property) ? $property['default'] : "") . "</td>";
            $html .= "<td style='font-size: 8px'>" . (array_key_exists("description", $property) ? $this->processBreakLine($property['description']) : "") . "</td>";
            $html .= "<td style='font-size: 8px'>";
            $html .= array_key_exists("maxLength", $property) && $property['maxLength'] ? "最大长度：" . $property['maxLength'] . "<br/>" : "";
            $html .= array_key_exists("minLength", $property) && $property['minLength'] ? "最小长度：" . $property['minLength'] . "<br/>" : "";
            $html .= array_key_exists("mock", $property) && array_key_exists("mock", $property['mock']) && $property['mock']['mock'] ? "Mock：" . $property['mock']['mock'] : "";
            $html .= "</td>";
            $html .= "</tr>";
            if (array_key_exists("properties", $property)) {
                $html .= $this->echoYapiTable($property, $indent . "　　", $toggleclass, $trclass . " " . $toggleclass);
            } elseif (array_key_exists("items", $property)) {
                $html .= $this->echoYapiTable($property['items'], $indent . "　　", $toggleclass, $trclass . " " . $toggleclass);
            }
        }
        return $html;
    }

    private function processBreakLine($string)
    {
        return str_replace("/", "<br/>", $string);
    }

    private function getInterfaceTagHtml($id)
    {
        $html = Cache::get('yapi_interface_' . $id);
        if ($html) {
            return $html;
        }

        $yapi_cookie = Cache::get("yapi_cookie");
        if (!$yapi_cookie) {
            if (!$this->login()) {
                return "获取接口详细信息失败[login failed]";
            }
        }

        $yapi_cookie = Cache::get("yapi_cookie");

        $headers = array(
            'Accept'         => 'application/json',
            'Accept-Charset' => 'utf-8'
        );
        $cookies = \GuzzleHttp\Cookie\CookieJar::fromArray($yapi_cookie, str_replace("https://", "", env("YAPI_DOMAIN")));
        $options = [
            'verify'  => false,
            'headers' => $headers,
            'cookies' => $cookies
        ];

        //获取接口详情
        $url = env("YAPI_DOMAIN") . '/api/interface/get?id=' . $id;
        $response = $this->client->request('GET', $url, $options);
        $json = json_decode($response->getBody()->getContents(), true);
        $api = $json['data'];

        //获取项目详情
        $url = env("YAPI_DOMAIN") . '/api/project/get?id=' . $api['project_id'];
        $response = $this->client->request('GET', $url, $options);
        $json = json_decode($response->getBody()->getContents(), true);
        $project = $json['data'];

        //获取变更历史
        $url = env("YAPI_DOMAIN") . '/api/log/list?typeid=' . $api['project_id'] . '&type=project&selectValue=' . $id . '&page=1&limit=1000';
        $response = $this->client->request('GET', $url, $options);
        $json = json_decode($response->getBody()->getContents(), true);
        $log_list = $json['data']['list'];
        $logs = array();
        foreach ($log_list as $log) {
            if (isset($log['data'])) {
                $logs[] = $log;
            }
        }

        $status = array(
            "done"   => "已完成",
            "undone" => "未完成"
        );
        $required = array(
            "0" => "否",
            "1" => "是"
        );

        if ($api['status'] <> "done") {
            $html = "接口状态未完成<br/>";
            //链接到yapi
            $html .= "<a href='" . env("YAPI_DOMAIN") . "/project/$api[project_id]/interface/api/$id' target='_blank' style='color: #f5f5f5'>api-id=$id</a>";
            return $html;
        }

        //基本信息
        $html = "<h2 id='bkmrk-基本信息'>基本信息</h2>";
        $html .= "<table width=100%><tr><td width=100px><b>接口名称：</b></td><td width=440px>"
            . $api['title'] . "</td><td width=100px><b>状  态：</b></td><td>"
            . $status[$api['status']] . "</td></tr><td><b>接口路径：</b></td><td>"
            . "<span style='padding: 0 3px;background-color: #8be9fd'>$api[method]</span> " . $project['basepath'] . $api['path'] . "</td><td><b>更新时间：</b></td><td>"
            . date("Y-m-d H:i:s", $api['up_time'] + 8 * 3600) . "</td><tr></tr><tr><td><b>Mock地址：</b></td><td colspan='3'>"
            . env("YAPI_DOMAIN") . "/mock/$api[project_id]" . $project['basepath'] . $api['path'] . "</td></tr></table>";

        //请求参数
        $html .= "<h2 id='bkmrk-请求参数'>请求参数</h2>";
        $html .= "<h3 id='bkmrk-Headers'>Headers:</h3>";
        $html .= "<table width=100%><tr style='font-weight: bold'><td>参数名称</td><td width='50%'>参数值</td><td>是否必填</td></tr>";
        foreach ($api["req_headers"] as $req_headers) {
            $html .= "<tr><td>$req_headers[name]</td><td>$req_headers[value]</td><td>" . $required[$req_headers["required"]] . "</td></tr>";
        }
        $html .= "</table>";

        $html .= "<h3 id='bkmrk-Body'>Body:</h3>";
        $request = $api["req_body_other"];
        $request_json = json_decode($request, true);

        $indent = "";
        $html .= "<table width=100% class='apitable'><tr style='font-weight: bold'><td>参数名称</td><td width=70px>类型</td><td width=45px>必填</td><td width=60px>默认值</td><td width=240px>备注</td><td width=130px>其他信息</td></tr>";
        $toggleclass = 'reqtr';
        $trclass = 'reqtr';
        $html .= $this->echoYapiTable($request_json, $indent, $toggleclass, $trclass);
        $html .= "</table>";

        //返回数据
        $html .= "<h2 id='bkmrk-返回数据'>返回数据</h2>";
        $response = $api["res_body"];
        $response_json = json_decode($response, true);

        $indent = "";
        $html .= "<table width=100% class='apitable'><tr style='font-weight: bold'><td>参数名称</td><td width=70px>类型</td><td width=45px>必填</td><td width=60px>默认值</td><td width=240px>备注</td><td width=130px>其他信息</td></tr>";
        $toggleclass = 'resptr';
        $trclass = 'resptr';
        $html .= $this->echoYapiTable($response_json, $indent, $toggleclass, $trclass);
        $html .= "</table>";

        //备注
        $html .= "<h2 id='bkmrk-备注'>备注</h2>";
        $html .= "<table width=100%><tr><td>" . $api['desc'] . "</td></tr></table>";

        //变更历史
        $html .= "<h2 id='bkmrk-变更历史'>变更历史</h2>";
        $html .= "
        <script src=\"/jsondiff/jquery.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"/jsondiff/jsl.format.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"/jsondiff/jsl.parser.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"/jsondiff/jdd.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
        $html .= "<table width=100%><tr><td width='100px'>变更日期</td><td>变更内容</td></tr>";
        foreach ($logs as $key => $log) {
            $add_time = date("Y-m-d", $log['add_time']);
            //$content = strip_tags($log["content"]);

            $old_query_path = isset($log["data"]["old"]["query_path"]) && $log["data"]["old"]["query_path"] ? str_replace("'", "\'", json_encode($log["data"]["old"]["query_path"])) : "{}";
            $old_req_headers = isset($log["data"]["old"]["req_headers"]) && $log["data"]["old"]["req_headers"] ? $log["data"]["old"]["req_headers"] : array();
            foreach ($old_req_headers as $old_req_header_k => $old_req_header) {
                unset($old_req_headers[$old_req_header_k]["_id"]);
            }
            $old_req_headers = json_encode($old_req_headers);
            $old_req_body_type = isset($log["data"]["old"]["req_body_type"]) ? '{"req_body_type":"' . $log["data"]["old"]["req_body_type"] . '"}' : '{}';
            $old_res_body_type = isset($log["data"]["old"]["res_body_type"]) ? '{"res_body_type":"' . $log["data"]["old"]["res_body_type"] . '"}' : '{}';
            $old_req_body = isset($log["data"]["old"]["req_body_other"]) && $log["data"]["old"]["req_body_other"] ? str_replace("'", "\'", $log["data"]["old"]["req_body_other"]) : "{}";
            $old_res_body = isset($log["data"]["old"]["res_body"]) && $log["data"]["old"]["res_body"] ? str_replace("'", "\'", $log["data"]["old"]["res_body"]) : "{}";
            $old_req_body = $this->replace_chars($old_req_body);
            $old_req_body_js = $this->replacejs_chars($old_req_body);
            $old_res_body = $this->replace_chars($old_res_body);
            $old_res_body_js = $this->replacejs_chars($old_res_body);

            $current_query_path = isset($log["data"]["current"]["query_path"]) && $log["data"]["current"]["query_path"] ? str_replace("'", "\'", json_encode($log["data"]["current"]["query_path"])) : "{}";
            $current_req_headers = isset($log["data"]["current"]["req_headers"]) && $log["data"]["current"]["req_headers"] ? $log["data"]["current"]["req_headers"] : array();
            foreach ($current_req_headers as $current_req_header_k => $current_req_header) {
                unset($current_req_headers[$current_req_header_k]["_id"]);
            }
            $current_req_headers = json_encode($current_req_headers);
            $current_req_body_type = isset($log["data"]["current"]["req_body_type"]) ? '{"req_body_type":"' . $log["data"]["current"]["req_body_type"] . '"}' : '{}';
            $current_res_body_type = isset($log["data"]["current"]["res_body_type"]) ? '{"res_body_type":"' . $log["data"]["current"]["res_body_type"] . '"}' : '{}';
            $current_req_body = isset($log["data"]["current"]["req_body_other"]) && $log["data"]["current"]["req_body_other"] ? str_replace("'", "\'", $log["data"]["current"]["req_body_other"]) : "{}";
            $current_res_body = isset($log["data"]["current"]["res_body"]) && $log["data"]["current"]["res_body"] ? str_replace("'", "\'", $log["data"]["current"]["res_body"]) : "{}";
            $current_req_body = $this->replace_chars($current_req_body);
            $current_req_body_js = $this->replacejs_chars($current_req_body);
            $current_res_body = $this->replace_chars($current_res_body);
            $current_res_body_js = $this->replacejs_chars($current_res_body);

            if ($old_req_body == $current_req_body && $old_res_body == $current_res_body
                && $old_req_body_type == $current_req_body_type && $old_res_body_type == $current_res_body_type
                && $old_req_headers == $current_req_headers && $old_query_path == $current_query_path) {
                continue;
            }

            $html .= "<tr><td>$add_time</td><td><span id='report_$log[_id]'></span><script>$(document).ready(function(){ 
                $('#report_$log[_id]').append(jdd.compareJson('$old_query_path',   '$current_query_path',   '<span style=\'cursor:pointer;background-color: #F4A460\' onclick=\'javascipt:$(\"#form_qrp_$log[_id]\").submit();\'>请求路径</span>：'));
                $('#report_$log[_id]').append(jdd.compareJson('$old_req_headers',  '$current_req_headers',  '<span style=\'cursor:pointer;background-color: #AFEEEE\' onclick=\'javascipt:$(\"#form_rhd_$log[_id]\").submit();\'>请求头部</span>：'));
                $('#report_$log[_id]').append(jdd.compareJson('$old_req_body_type','$current_req_body_type','<span style=\'cursor:pointer;background-color: #CCDDFF\' onclick=\'javascipt:$(\"#form_rbt_$log[_id]\").submit();\'>请求类型</span>：'));
                $('#report_$log[_id]').append(jdd.compareJson('$old_res_body_type','$current_res_body_type','<span style=\'cursor:pointer;background-color: #00FFCC\' onclick=\'javascipt:$(\"#form_sbt_$log[_id]\").submit();\'>返回类型</span>：'));
                $('#report_$log[_id]').append(jdd.compareJson('$old_req_body_js',  '$current_req_body_js',  '<span style=\'cursor:pointer;background-color: #7FFF00\' onclick=\'javascipt:$(\"#form_req_$log[_id]\").submit();\'>请求报文</span>：'));
                $('#report_$log[_id]').append(jdd.compareJson('$old_res_body_js',  '$current_res_body_js',  '<span style=\'cursor:pointer;background-color: #EEE8AA\' onclick=\'javascipt:$(\"#form_res_$log[_id]\").submit();\'>返回报文</span>：'));
            });</script>
            <form id='form_qrp_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_query_path   </textarea><textarea style='display: none' name='right'>$current_query_path   </textarea></form>
            <form id='form_rhd_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_req_headers  </textarea><textarea style='display: none' name='right'>$current_req_headers  </textarea></form>
            <form id='form_rbt_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_req_body_type</textarea><textarea style='display: none' name='right'>$current_req_body_type</textarea></form>
            <form id='form_sbt_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_res_body_type</textarea><textarea style='display: none' name='right'>$current_res_body_type</textarea></form>
            <form id='form_req_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_req_body     </textarea><textarea style='display: none' name='right'>$current_req_body     </textarea></form>
            <form id='form_res_$log[_id]' action='/jsondiff/index.php' target='_blank' method='post'><textarea style='display: none' name='left'>$old_res_body     </textarea><textarea style='display: none' name='right'>$current_res_body     </textarea></form>
            </td></tr>";
        }
        $html .= "</table>";

        //链接到yapi
        $html .= "<a href='" . env("YAPI_DOMAIN") . "/project/$api[project_id]/interface/api/$id' target='_blank' style='color: #f5f5f5'>api-id=$id</a>";

        if (!env("APP_DEBUG")) {
            Cache::put('yapi_interface_' . $id, $html, 3600 * 24);
        }

        return $html;
    }

    private function replace_chars($string): array|string
    {
        $string = str_replace('\"', '\\\"', $string);
        $string = str_replace('\d', '', $string);
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", '', $string);
        $string = str_replace("\t", '', $string);
        $string = str_replace('\r', '', $string);
        $string = str_replace('\n', '', $string);
        $string = str_replace('\t', '', $string);
        $string = str_replace('\\APP', '/APP', $string);
        return str_replace(chr(9), '', $string);
    }

    private function replacejs_chars($string): array|string
    {
        $string = str_replace('\\\\\\\\"', '\\\\\\"', $string);
        return $string;
    }

    private function getStyleScript()
    {
        return <<<StyleScript
    <style>
        .apitable td {
            vertical-align: middle;
        }

        .trapi-icon {
            display: inline-block;
            width: 17px;
            height: 17px;
            text-align: center;
            line-height: 14px;
            border: 1px solid #e9e9e9;
            user-select: none;
            background: #fff;
            margin-right: 8px;
            vertical-align: middle;
        }

        .trapi-icon-expanded:after {
            content: "-";
            box-sizing: border-box;
        }

        .trapi-icon-collapsed:after {
            content: "+";
            box-sizing: border-box;
        }
    </style>
    <script>
		var divScrollHeight = document.querySelector(".page-content").scrollHeight;

		function toggle_tr(event, className) {
			document.querySelector(".page-content").style.height = divScrollHeight + "px";
			event.querySelector("span.trapi-icon").classList.toggle("trapi-icon-expanded");
			event.querySelector("span.trapi-icon").classList.toggle("trapi-icon-collapsed");
			document.querySelectorAll("table.apitable ." + className).forEach(
				function (item) {
					item.classList.toggle("hidden");
				}
			);
		}
    </script>
StyleScript;
    }
}