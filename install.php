<?php

require_once "config.php";

header('Content-type: text/html');

?>
<html>
	</body>
	</br>
	To use it:
	</br>
	Download the latest <a target="_blank" href="http://code.google.com/p/selenium/downloads/list">selenium-server-standalone-*.jar</a> 
	</br>
	Download the latest <a target="_blank" href="http://code.google.com/p/chromium/downloads/list">chromedriver</a> for your architecture.
	</br>
	Run with: java -jar -Dwebdriver.chrome.driver=PATH_TO_CHROMEDRIVER PATH_TO_SELENIUM
	</body>
</html>

