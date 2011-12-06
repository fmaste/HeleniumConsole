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
	if (isset($_REQUEST["code"])) {
		saveTestCode($test, $_REQUEST["code"]);
	}
?>
<html>
	<body>
		<a href="/">All tests</a>
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
			<input type="hidden" name="test" value="<?php echo $test; ?>" />
			<textarea rows="40" cols="100" name="code"><?php echo getTestCode ($test); ?></textarea>
		<br />
			<input type="submit" value="Save" />
		</form>
	</body>
</html>
<?php }

