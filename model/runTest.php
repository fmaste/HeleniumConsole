<?php

require_once "../config.php";

header('Content-type: text/html');

$test = $_REQUEST["test"];
$env = $_REQUEST["env"];

if (isTestNameValid($test)) {
	runTest ($test, $env);
} else {
	echo "ERROR";
}

