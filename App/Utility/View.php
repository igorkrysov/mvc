<?php

namespace App\Utility;
use Exception;

class View {
    
    /**
     * @param string $pathView path to view file
     * @return void
     */
    public function __construct($pathView) {
        $file = dirname($_SERVER["SCRIPT_FILENAME"]) . "/Views/" . $pathView;
        if (!file_exists($file)) {
            var_dump(dirname($_SERVER["SCRIPT_FILENAME"]));
            throw new Exception($file . ' is not exist');
        }
        
        include $file;
    }
}