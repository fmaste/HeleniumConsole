<?php

require_once "config.php";

header('Content-type: text/html');

if (!isset($_REQUEST['test'])) {
	echo "No test specified!";
} else {
	$test = $_REQUEST['test'];
	if (!isTestNameValid($test) || !testExists($test)) {
		echo "Not a valid tests.";
		exit();
	} else {
		deleteTest ($test);
		header ("Location: /");
	}
}

