<?php

require_once "../config.php";

header('Content-type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$json = $data["json"];
$test = $json["test"];
$code = $json["code"];

if (isTestNameValid($test)) {
	saveTestCode ($test, $code);
} else {
	echo "ERROR";
}

