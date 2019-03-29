<?php

namespace App\Utility;

class Env {
    public static function loadEnvFromFile($file = null) {
        if (is_null($file)) {
            $lines = file(dirname($_SERVER["SCRIPT_FILENAME"]) . "/.env");
        } else {
            $lines = file($file);
        }
        
        
        foreach ($lines as $line) {
            if ($line != "") {
                //echo $line . "<br>";                
                putenv(trim($line));
            }
        }
    }
}