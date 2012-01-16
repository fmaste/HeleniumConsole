<?php

require_once "../config.php";

header('Content-type: text/json');

$test = $_REQUEST["test"];
$code = $_REQUEST["code"];

if (isTestNameValid($test)) {
	saveTestCode ($test, $code);
} else {
	echo "ERROR";
}

