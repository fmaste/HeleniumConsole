<?php

define ("HELENIUM_DIR", "/var/www/helenium");
define ("HELENIUM_TESTS_DIR", "/var/www/helenium-tests/current");
define ("HELENIUM_TEST_TEMPLATE", "/var/www/helenium-tests/Google.hs");
define ("HELENIUM_DOCS_COMMANDS", HELENIUM_DIR . "/doc/Helenium.html");

function getTests () {
	$tests = array();
	$handler = opendir(HELENIUM_TESTS_DIR . "/Test");
	while ($file = readdir($handler)) {
		if (!is_dir($file) && $file != "." && $file != ".." && substr($file, -3, 3) == ".hs") { 
			$tests[] = substr($file, 0, strlen($file) - 3);
		}       
	}       
	closedir($handler);
	sort($tests);
	return $tests;
}

function isTestNameValid ($test) {
	if (!preg_match("/^[a-zA-Z]+$/", $test)) {
		return false;
	} else {
		return true;
	}
}

function testExists ($test) {
	$tests = getTests();
	foreach ($tests as $validTest) {
		if ($test == $validTest) {
			return true;
		}
	}
	return false;
}

function createNewTest ($test) {
	copy (HELENIUM_TEST_TEMPLATE, getTestPath ($test));
}

function deleteTest ($test) {
	unlink (getTestPath ($test));
}

function getTestPath ($test) {
	return HELENIUM_TESTS_DIR . "/Test/" . $test . ".hs";
}

function getTestCode ($test) {
	return file_get_contents (getTestPath ($test));
}

function saveTestCode ($test, $code) {
	file_put_contents (getTestPath ($test), $code);
}

function getTestEnvironments () {
	# Servers
	$linuxProd = "http://selenium-server-prod.local:4444/wd/hub";
	$linuxQa2 = "http://selenium-server-qa2.local:4444/wd/hub";
	$linuxQa1 = "http://selenium-server-qa1.local:4444/wd/hub";
	$linuxDev = "http://selenium-server-dev.local:4444/wd/hub";
	$local = "http://" . $_SERVER["REMOTE_ADDR"] . ":4444/wd/hub";

	# Browsers
	$ie = "ie";
	$firefox = "firefox";
	$chrome = "chrome";

	return array(
		"local_firefox" => array (
			"name" => "Firefox",
			"server" => $local,
			"browser" => $firefox
		),
		"local_chrome" => array (
			"name" => "Chrome",
			"server" => $local,
			"browser" => $chrome
		),
		"local_ie" => array (
			"name" => "Internet Explorer",
			"server" => $local,
			"browser" => $ie
		),
	);
}

function runTest ($test, $environmentKey) {
	$envs = getTestEnvironments();
	$env = $envs[$environmentKey];
	$serverParam = "--server=" . $env["server"];
	$browserParam = "--browser=" . $env["browser"];
        $command = 
		"sudo -u mastellonium " . HELENIUM_DIR . "/runtest.sh " . 
		HELENIUM_TESTS_DIR . " Test." . $test . " " . 
		$serverParam . " " . $browserParam . " 2>&1";
	passthru($command, $output);
}

function getCommandsPage () {
	return file_get_contents (HELENIUM_DOCS_COMMANDS);
}

