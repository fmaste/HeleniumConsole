<?php

require_once "../config.php";

header('Content-type: text/json');

$test = json_decode($_REQUEST["test"]);
$code = json_decode($_REQUEST["code"]);

if (isTestNameValid($test)) {
	//saveTestCode ($test, $code);
	echo $test . ": " . $code;
} else {
	echo $test . ": " . $code;
	echo "\n";
	echo "ERROR";
}

