<?php
$left = str_replace("\'", "'", $_POST["left"]);
$left = str_replace('\\\\"', '\\"', $left);
$right = str_replace("\'", "'", $_POST["right"]);
$right = str_replace('\\\\"', '\\"', $right);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JSON Diff - The semantic JSON compare tool</title>

    <link rel="stylesheet" href="reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="throbber.css" type="text/css" media="screen">
    <link rel="stylesheet" href="jdd.css" type="text/css" media="screen">

    <script src="jquery.min.js" type="text/javascript" charset="utf-8"></script>

    <script src="jsl.format.js" type="text/javascript" charset="utf-8"></script>
    <script src="jsl.parser.js" type="text/javascript" charset="utf-8"></script>
    <script src="jdd.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>

<div id="main">
    <div class="header">
        <h1>JSON Diff</h1>
        <h3>The semantic JSON compare tool</h3>
    </div>

    <div class="initContainer">
        <div class="left">
            <textarea spellcheck="false" id="textarealeft" placeholder="Enter JSON to compare, enter an URL to JSON" tabindex="1"><?php echo $left; ?></textarea>
            <pre id="errorLeft" class="error"></pre>
            <span class="fileInput">or <input type="file" id="fileLeft" onchange="jdd.handleFiles(this.files, 'left')" tabindex="4"></span>
        </div>

        <div class="center">
            <button id="compare" tabindex="3">Compare</button>
            <div class="throbber-loader"></div>
        </div>

        <div class="right">
            <textarea spellcheck="false" class="right" id="textarearight" placeholder="Enter JSON to compare, enter an URL to JSON" tabindex="2"><?php echo $right; ?></textarea>
            <pre id="errorRight" class="error"></pre>
            <span class="fileInput">or <input type="file" id="fileRight" onchange="jdd.handleFiles(this.files, 'right')" tabindex="5"></span>
        </div>
    </div>

    <div class="diffcontainer">
        <div id="report">
        </div>
        <pre id="out" class="left" class="codeBlock"></pre>
        <pre id="out2" class="right" class="codeBlock"></pre>
        <ul id="toolbar" class="toolbar"></ul>
    </div>
</div>

</body>
</html>
