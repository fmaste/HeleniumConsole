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
	<head>
		<script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/ace.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/theme-vibrant_ink.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/mode-javascript.js"></script>
	</head>
	<body>
		<a href="/">All tests</a>
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" onsubmit="return onSubmit();">
			<input type="hidden" id="test" name="test" value="<?php echo $test; ?>" />
			<input type="hidden" id="code" name="code" value="" />
			<input type="submit" value="Save" />
			<div id="editor" style="height: 800px; width: 900px"><?php echo getTestCode ($test); ?></div>
		</form>
		<script>
			window.onload = function() {
				window.aceEditor = ace.edit("editor");
				window.aceEditor.setTheme("ace/theme/vibrant_ink");
				document.getElementById('editor').style.fontSize='12px';
				window.aceEditor.setHighlightActiveLine(true);
				window.aceEditor.setShowPrintMargin(false);
				window.aceEditor.setReadOnly(false);
				var JavaScriptMode = require("ace/mode/javascript").Mode;
				window.aceEditor.getSession().setMode(new JavaScriptMode());
				<?php if (isset($_REQUEST["line"]) && is_numeric($_REQUEST["line"]) && $_REQUEST["line"] > 0) { ?>
					window.aceEditor.gotoLine(<?php echo $_REQUEST["line"]; ?>);
				<?php } ?>
			}
			function onSubmit () {
				var code = window.aceEditor.getSession().getValue();
				document.getElementById('code').value = code;
				return true;
			}
		</script>
	</body>
</html>
<?php }

