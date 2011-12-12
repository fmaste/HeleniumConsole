<?php
require_once "config.php";
header('Content-type: text/html');
$name = "Welcome to Mastellonium suite";
?>
<html>
	<head>
		<title><?=$name?></title>
		<style>
			*{border:0;padding:0;margin:0;font-size:10px;font-family: helvetica, arial}
			#container {
                margin:10px auto;
                width:900px;height:auto;min-height:600px;
                position:relative;
                background: url(img/bg.png)/*-moz-linear-gradient(bottom, rgba(10,100,255,0.65) 0%, rgba(10,100,255,0) 100%)*/;
                -moz-box-shadow: 6px 6px 10px #000000;
                border:1px solid #aaa;
            }
            #header {
                margin: 10px auto;
                height: 200px;width:90%;
                padding: 5px;
                border-bottom: 2px groove #999;
            }

            #logo {
                -moz-box-shadow: 0px 0px 10px #000;
                margin-top: 10px;
                border: 10px solid #fff;
                height: 100px; width: 100px;
                border-radius: 25px;
                background: -moz-linear-gradient(bottom, rgba(135,207,62,0.9) 0%, rgba(135,207,62,0) 100%);
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
                width: 80%;float:left;margin: 10px 0 0 42px;
                font-size: 11px;line-height: 14px;
            }
            #content{
                padding:10px;
                margin: 0 0 0 30px;
                width: 91%;
                height: auto;min-height: 200px;
            }
            #title{width: 100%;height: 30px; font-weight: bold; font-size: 10px;background:url(img/1x1.png);}
            .title{width:100px;float:left;text-align: center;text-decoration: none;color:#222;font-size:1.5em;line-height: 25px;padding-left: 4px;}
            .larger{}
            li{height:30px;margin:3px;}
			ul{list-style: none;}
			a{text-decoration: none;color:#222;font-size:1.5em;}
			a:hover{color:#444;opacity: 1;}
			#testList{width:100%;float:left;}
			.eachColumn{width:100px;float:left;text-align: center;}
			.first{width: 50%;text-align: left;}
			.eachTest{width:500px;float:left;height: 15px;}
			#newtest{position: absolute; bottom: 10px; right:10px;}


		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
                <div id="logo"><span>M</span></div>
				<h1><?=$name?></h1>
                <ul id="version">
                    <li><span>Copyright: </span>Federico Mastellone</li>
                    <li><span>Version: </span>0.1</li>
                </ul>
                <p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht.Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht.</p>
                <a id="install" href="/install.php">How to Install</a>
			</div>
            <div id="content">
                <ul id="title">
                    <li class="title first">Tests</li>
                    <li class="title larger">Browsers</li>
                </ul>
                <ul id="testList">
                <?php foreach (getTests() as $test) { ?>
                        <li class="eachTest">
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

