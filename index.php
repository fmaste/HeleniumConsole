<?php

require_once "config.php";

header('Content-type: text/html');

?>
<html>
	</body>
	<a href="/new.php">New</a>
	<a href="/install.php">Install</a>
	</br>
	</br>
	<table>
<?php foreach (getTests() as $test) { ?>
		<tr>
			<td>
				<a href="<?php echo ("/edit.php?test=" . $test); ?>"><?php echo $test ?></a>
			</td>
	<?php foreach (getTestEnvironments() as $envKey => $env) { ?>
			<td>
				<a href="<?php echo ("/test.php?test=" . $test . "&env=" . $envKey) ?>"><?php echo $env["name"] ?></a>
			</td>
	<?php }	?>
		</tr>
<?php } ?>
	</table>
	</body>
</html>

