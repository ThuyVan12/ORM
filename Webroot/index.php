<?php

use MVC\Dispatcher;


define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require_once("../vendor/autoload.php");
//require(ROOT . 'src/Config/core.php');

//require(ROOT . 'src/router.php');
//require(ROOT . 'src/request.php');
//require(ROOT . 'src/dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>