<?php

use Database\Migrations\PostTable;
use App\Utility\Env;

function autoloader($class) {
    // $includeString = "/var/www/mvc/app/controllers/" . $class . '.php';
    $includeString = "/var/www/mvc/".str_replace('\\', '/', $class) . '.php';
    echo "<br> including string: " . $includeString . "<br>";
    if (file_exists($includeString)) {
        include $includeString;
        echo "<br>including...<br>";
    } else {
        echo "<b>" . $includeString . " file not exist</b><br>";
    }
}

spl_autoload_register('autoloader');

Env::loadEnvFromFile('/var/www/mvc/.env');

$post = new PostTable();
$post->start();