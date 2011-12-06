<?php

require_once "config.php";

header('Content-type: text/html');

?>
<html>
	</body>
	</br>
	To use it:
	</br>
	sudo apt-get install default-jre git-core
	</br>
	cd /home/sites
	</br>
	sudo git clone git://github.com/fmaste/Helenium.git helenium 
	</br>
	When finished start the server on your machine:
	</br>
	cd helenium
	</br>
	./runserver.sh
	</br>
	(If not on a linux 32 machine, move the chromedriver simlink in lib to rou architecture)
	</body>
</html>

