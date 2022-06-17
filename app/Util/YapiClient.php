<?php namespace BookStack\Util;

use BookStack\Entities\Models\Page;
use BookStack\Exceptions\NotifyException;
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
        preg_match_all("/\[yapi_interface\](.*)\[\/yapi_interface\]/i", $page->html, $yapi);
        if ($yapi && count($yapi) > 1) {
            foreach ($yapi[1] as $interface_id) {
                if (is_numeric($interface_id)) {
                    Cache::put('yapi_interface_' . $interface_id, null, 3600 * 24);
                }
            }
        }

        if ($page->getRelation("book")->getOriginal("name") == "发版变更脚本记录" && $page->getOriginal("chapter_id") > 0) {
            $parent = $page->chapter()->first();
            $page = $page->forceFill([
                'name' => $parent->getRawAttribute("name") . "-" . date("Ymd")
            ]);
        }
        return $page;
    }

    public static function getPageName($parent)
    {
        if ($parent->getOriginal("name") != "发版变更脚本记录" && $parent->getRelation("book")->getOriginal("name") == "发版变更脚本记录") {
            $name = $parent->getOriginal("name") . "-" . date("Ymd");
            $page = Page::visible()->where("name", "=", $name)->first();
            if ($page) {
                $redirectLocation = "/books/" . $page->getOriginal("book_slug") . "/chapter/" . $parent->getOriginal("name");
                throw new NotifyException("页面 $name 已存在，请直接编辑", $redirectLocation);
            }
        } else {
            $name = trans('entities.pages_initial_name');
        }
        return $name;
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

        $url = env("YAPI_DOMAIN") . '/api/user/login_by_ldap';
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
            $html .= "<td>" . (array_key_exists("default", $property) ? $property['default'] : "") . "</td>";
            $html .= "<td>" . (array_key_exists("description", $property) ? $property['description'] : "") . "</td>";
            $html .= "<td>";
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

        $status = array(
            "done"   => "已完成",
            "undone" => "未完成"
        );
        $required = array(
            "0" => "否",
            "1" => "是"
        );

        //基本信息
        $html = "<h2 id='bkmrk-基本信息'>基本信息</h2>";
        $html .= "<table width=98%><tr><td width=120px><b>接口名称：</b></td><td>"
            . $api['title'] . "</td><td width=120px><b>状  态：</b></td><td>"
            . $status[$api['status']] . "</td></tr><td><b>接口路径：</b></td><td>"
            . $api['path'] . "</td><td><b>更新时间：</b></td><td>"
            . date("Y-m-d H:i:s", $api['up_time'] + 8 * 3600) . "</td><tr></tr><tr><td><b>Mock地址：</b></td><td colspan='3'>"
            . env("YAPI_DOMAIN") . $project['basepath'] . $api['path'] . "</td></tr></table>";

        //请求参数
        $html .= "<h2 id='bkmrk-请求参数'>请求参数</h2>";
        $html .= "<h3 id='bkmrk-Headers'>Headers:</h3>";
        $html .= "<table width=98%><tr style='font-weight: bold'><td>参数名称</td><td width='50%'>参数值</td><td>是否必填</td></tr>";
        foreach ($api["req_headers"] as $req_headers) {
            $html .= "<tr><td>$req_headers[name]</td><td>$req_headers[value]</td><td>" . $required[$req_headers["required"]] . "</td></tr>";
        }
        $html .= "</table>";

        $html .= "<h3 id='bkmrk-Body'>Body:</h3>";
        $request = $api["req_body_other"];
        $request_json = json_decode($request, true);

        $indent = "";
        $html .= "<table width=98% class='apitable'><tr style='font-weight: bold'><td>参数名称</td><td width=80px>类型</td><td width=50px>必填</td><td width=80px>默认值</td><td width=120px>备注</td><td>其他信息</td></tr>";
        $toggleclass = 'reqtr';
        $trclass = 'reqtr';
        $html .= $this->echoYapiTable($request_json, $indent, $toggleclass, $trclass);
        $html .= "</table>";

        //返回数据
        $html .= "<h2 id='bkmrk-返回数据'>返回数据</h2>";
        $response = $api["res_body"];
        $response_json = json_decode($response, true);

        $indent = "";
        $html .= "<table width=98% class='apitable'><tr style='font-weight: bold'><td>参数名称</td><td width=80px>类型</td><td width=50px>必填</td><td width=80px>默认值</td><td width=120px>备注</td><td>其他信息</td></tr>";
        $toggleclass = 'resptr';
        $trclass = 'resptr';
        $html .= $this->echoYapiTable($response_json, $indent, $toggleclass, $trclass);
        $html .= "</table>";

        //备注
        $html .= "<h2 id='bkmrk-备注'>备注</h2>";
        $html .= "<table width=98%><tr><td width=120px>" . $api['desc'] . "</td></tr></table>";

        //链接到yapi
        $html .= "<a href='" . env("YAPI_DOMAIN") . "/project/$api[project_id]/interface/api/$id' target='_blank' style='color: #f5f5f5'>api-id=$id</a>";

        if (!env("APP_DEBUG")) {
            Cache::put('yapi_interface_' . $id, $html, 3600 * 24);
        }

        return $html;
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