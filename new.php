<?php

require_once "config.php";

header('Content-type: text/html');

if (isset($_REQUEST['test'])) {
	echo "No test specified!";
	$test = $_REQUEST['test'];
	if (!isTestNameValid($test)) {
		echo "Not a valid tests name.";
	} else {
		createNewTest ($test);
		header ('Location: /');
		exit ();
	}
} else { ?>
<html>
	<body>
		<a href="/">All tests</a>
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
			<input size="40" name="test" type="text" />
			<input type="submit" value="Create" />
		</form>
	</body>
</html>
<?php }

