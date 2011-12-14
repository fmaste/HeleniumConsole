<?php
require_once "config.php";
header('Content-type: text/html');
$name = "Welcome to Mastellonium suite";
$text = "Esta bueno que a veces haya gente incompetente, indirectamente, ellos son los que impulsan la creatividad en el resto. Esto hace que para remediar deficiencias ajenas, otros deben exceder lo normal y crear, construir, edificar; de esta manera se logra un balance. Para ir cerrando, si usas IE sos un gil.";
?>
<html>
	<head>
		<title><?=$name?></title>
		<style>
			*{border:0;padding:0;margin:0;font-size:10px;font-family: helvetica, arial;}
			#container {
                position:relative;
                margin:10px auto;
                width:900px;
                background: url(img/bg.png);
                box-shadow: 6px 6px 10px #000000;
                border:1px solid #aaa;
            }
            #header {
                margin: 10px auto;
                height: 200px;width:90%;
                padding: 5px;
                border-bottom: 2px groove #999;
            }

            #logo {
                box-shadow: 0px 0px 10px #000;
                margin-top: 10px;
                border: 10px solid #fff;
                height: 100px; width: 100px;
                border-radius: 25px;
                background: -moz-linear-gradient(bottom, rgba(135,207,62,0.9) 0%, rgba(135,207,62,0) 100%);
                background: -webkit-gradient(linear,left bottom, left top, from(rgba(135,207,62,0.9)), to(rgba(135,207,62,0)));
                float:left;
            }

            #logo span {
                padding-left: 8px;
                font-size: 10em;
                line-height: 107px;
                color:#fff;
                font-family: Helvetica, arial;
                font-weight: bold;
            }

            #install {
                position:absolute;top:10px;right:10px;
                font-size: 1em;
            }

            h1{
                text-align:left;
                font-size: 2.5em;
                margin:0 0 10px 40px;
                float:left;
                font-weight: bold;
            }

            #version li span {
                font-weight: bold;
                font-size: 13px;
            }
            #version li {
                height:20px;
                font-size: 13px;
            }
            #version{
                margin-left: 40px;
                float:left;width:400px;
            }
            #header p{
                width: 80%;float:left;margin: 10px 0 0 90px;
                font-size: 11px;line-height: 14px;
                text-indent: 10px;
            }
            #content{
                padding:10px;
                margin: 0 0 0 30px;
                padding-bottom: 30px;
                width: 900px;
                display: table-cell;
            }
            .eachTest{
                width:875px;float:left;height: 25px;border:0;margin:0;
            }
            .withbg {
                background: rgba(135,207,62,0.2);
            }
            .eachColumn{
                width:120px;float:left;
                text-align: center;
            }
            #title{width: 100%;height: 30px; font-weight: bold; font-size: 10px;background: rgba(0,0,0,0.1);}
            .title{width:45%;float:left;text-align: center;text-decoration: none;color:#222;font-size:1.5em;line-height: 25px;padding-left: 4px;}
            .larger{}
            li{height:30px;margin:3px;}
			ul{list-style: none;}
			a{text-decoration: none;color:#222;font-size:1.5em;display: block; border-radius: 15px;padding-left: 5px;padding-right: 5px;-moz-transition: opacity 1s ease 0s;}
			a:hover{color:#444;opacity: 1;-webkit-transition: opacity 1s;box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3), 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 0 10px rgba(255, 255, 255, 0.898)}
			#testList{width:100%;float:left;}
			.first{width: 45%;text-align: left;}
            .first a{padding-left:10px;}
			#newtest{position: absolute; bottom: 10px; right:10px;}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
                <div id="logo"><span>M</span></div>
				<h1><?=$name?></h1>
                <ul id="version">
                    <li><span>Made by: </span>Federico Mastellone</li>
                    <li><span>Design by: </span>Linux Mint</li>
                    <li><span>Chorized by: </span>Lucas Tettamanti</li>
                    <li><span>Version: </span>0.1</li>
                </ul>
                <p><?=$text?></p>
                <a id="install" href="/install.php">How to Install</a>
			</div>
            <div id="content">
                <ul id="title">
                    <li class="title first">Tests</li>
                    <li class="title larger">Browsers</li>
                </ul>
                <ul id="testList">
                <?php
                    $i = 0;
                    foreach (getTests() as $test) {
                        $bg = $i % 2;
                        $i++;
                        ?>
                        <li class="eachTest<?=$bg ? " withbg" : ""?>">
                            <ul class="eachRow">
                                <li class="eachColumn first"><a href="<?="/edit.php?test=".$test?>"><?=$test?></a></li>
                            <?php foreach (getTestEnvironments() as $envKey => $env) { ?>
                                <li class="eachColumn"><a href="<?="/test.php?test=".$test."&env=".$envKey?>"><?=$env["name"]?></a></li>
                            <?php }	?>
                            </ul>
                        </li>
                <?php } ?>
                </ul>
                <a id="newtest" href="/new.php">New Test</a>
            </div>
		</div>
	</body>
</html>

