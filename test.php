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
	}
	$envKey = $_REQUEST["env"];
	$envs = getTestEnvironments();
	$env = $envs[$envKey];
	$serverParam = "--server=" . $env["server"];
	$browserParam = "--browser=" . $env["browser"];
	chdir(HELENIUM_DIR);
	$command = "sudo -u federico /home/sites/helenium/runtest.sh " . $test . " " . $serverParam . " " . $browserParam . " 2>&1";
	passthru($command, $output);
}

