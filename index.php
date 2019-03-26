<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function autoloader($class) {
    // $includeString = "/var/www/mvc/app/controllers/" . $class . '.php';
    $includeString = str_replace('\\', '/', $class) . '.php';
    echo "<br>" . $includeString . "<br>";
    if (file_exists($includeString)) {
        include $includeString;
        echo "<br>including...<br>";
    } else {
        echo "<b>" . $includeString . " file not exist</b><br>";
    }
}

spl_autoload_register('autoloader');

$url = $_SERVER["REQUEST_URI"];
$params = explode('/', $url);
// var_dump($params);
$controller = isset($params[1]) ? $params[1] : null;
$method = isset($params[2]) ? $params[2] : null;


if (!is_null($controller) && !is_null($method)) {
    var_dump($controller);
    var_dump($method);


    // $obj = new $controller();
    //  include 'App/Controllers/HelloWorldController.php';
    $class = 'App\\Controllers\\' . $controller;

    $obj = new $class();
    $obj->$method();
}


function pre($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}