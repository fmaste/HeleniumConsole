<?php

require_once "../config.php";

header('Content-type: application/json');

echo json_encode(getTestEnvironments());

