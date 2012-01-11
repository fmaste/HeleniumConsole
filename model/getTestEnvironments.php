<?php

require_once "../config.php";

header('Content-type: text/json');

echo json_encode(getTestEnvironments());

