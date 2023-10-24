<?php

require __DIR__ . '/../vendor/autoload.php';
require_once 'database.php';
require_once 'utils.php';


use Models\Model;

$db = connect();
Model::setDb($db);




