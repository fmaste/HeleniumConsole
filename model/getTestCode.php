<?php

require_once "../config.php";

header('Content-type: text/json');

$test = $_REQUEST["test"];

if (isTestNameValid($test)) {
	echo json_encode(getTestCode($test));
} else {
	echo "ERROR";
}

