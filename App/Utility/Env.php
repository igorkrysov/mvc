<?php

namespace App\Utility;

class Env {
    public static function loadEnvFromFile() {
        $lines = file(dirname($_SERVER["SCRIPT_FILENAME"]) . "/.env");
        
        foreach ($lines as $line) {
            if ($line != "") {
                echo $line . "<br>";                
                putenv(trim($line));
            }
        }
    }
}