<title>EZRent-MVC</title>
<?php

error_reporting(~E_NOTICE);
// 'Home' is the default controller
$controller = $_GET['c'] ?? 'Post';
// 'index' is the default method
$method = $_GET['m'] ?? 'index';

include_once "controller/Controller.class.php";
include_once "controller/$controller.class.php";// Go!
(new $controller)->$method();
