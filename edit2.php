<?php

require_once "config.php";

header('Content-type: text/html');

if (!isset($_REQUEST['test'])) {
	echo "No test specified!";
	exit();
} else {
	$test = $_REQUEST['test'];
	if (!isTestNameValid($test) || !testExists($test)) {
		echo "Not a valid tests.";
		exit();
	}
	if (isset($_REQUEST["code"])) {
		saveTestCode($test, $_REQUEST["code"]);
	}
} ?>
<html>
	<head>
		<link rel="stylesheet" href="include/codemirror/css/codemirror.css">
		<link rel="stylesheet" href="include/codemirror/css/night.css">
		<style type="text/css">
			.CodeMirror {
				border: 1px solid #eee;
			}
			.CodeMirror-scroll {
				height: auto;
				overflow-y: hidden;
				overflow-x: auto;
				width: 100%;
			}
		</style>
		<script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="include/codemirror/js/codemirror.js"></script>
		<script type="text/javascript" charset="utf-8" src="include/codemirror/mode/haskell.js"></script>
	</head>
	<body>
		<a href="/">All tests</a>
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" onsubmit="return onSubmit();">
			<input type="hidden" id="test" name="test" value="<?php echo $test; ?>" />
			<input type="submit" value="Save" />
			<textarea id="editor" name="code"><?php echo getTestCode ($test); ?></textarea>
		</form>
		<script>
			jQuery(function() {
				window.editor = CodeMirror.fromTextArea (document.getElementById('editor'), {
					//value: "<?php // echo getTestCode ($test); ?>",
					mode: "haskell",
					theme: "night",
					lineNumbers: true,
					matchBrackets: true,
					indentUnit: 2, // How many spaces a block (whatever that means in the edited language).
					tabSize: 1 // The width of a tab character.
				});
			});
			function onSubmit () {
				// Copy the content of the editor into the textarea.
				window.editor.save ();
				return true;
			}
		</script>
	</body>
</html>

