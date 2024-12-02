<title>EZRent-MVC</title>
<?php
session_start();

$method = $_GET['m'] ?? 'index';

// Cek login
if (isset($_SESSION["username"])) {
    $controller = $_GET['c'] ?? 'Items';
} else {
    $controller = $_GET['c'] ?? 'Auth';
}

include_once "controller/Controller.class.php";
include_once "controller/$controller.class.php";// Go!
(new $controller)->$method();
