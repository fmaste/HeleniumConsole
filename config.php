<?php

define ("HELENIUM_DIR", "../helenium");
define ("HELENIUM_TESTS_DIR", HELENIUM_DIR . "/src/Test");
define ("HELENIUM_TEST_TEMPLATE", HELENIUM_TESTS_DIR . "/Google.hs");

function getTests () {
	$tests = array();
	$handler = opendir(HELENIUM_TESTS_DIR);
	while ($file = readdir($handler)) {
		if (!is_dir($file) && $file != "." && $file != "..") { 
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
	return HELENIUM_TESTS_DIR . "/" . $test . ".hs";
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
	$firefox = "firefox";
	$chrome = "chrome";

	return array(
		"local_firefox" => array(
			"name" => "Firefox",
			"server" => $local,
			"browser" => $firefox
		),
		"local_chrome" => array(
			"name" => "Chrome",
			"server" => $local,
			"browser" => $chrome
		),
	);
}

