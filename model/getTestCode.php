<?php

require_once "../config.php";

header('Content-type: application/json');

$test = $_GET["test"];

if (isTestNameValid($test)) {
	echo json_encode(getTestCode($test));
} else {
	echo "ERROR";
}

