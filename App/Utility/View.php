<?php

namespace App\Utility;

use Exception;
use App\Exceptions\FileNotFoundException;

class View {
    
    public $params = [];

    /**
     * @param string $pathView path to view file
     * @return void
     */
    public function __construct($pathView, $params = []) {
        $this->params = $params;
        $file = dirname($_SERVER["SCRIPT_FILENAME"]) . "/Views/" . $pathView;
        if (!file_exists($file)) {
            // var_dump(dirname($_SERVER["SCRIPT_FILENAME"]));
            throw new FileNotFoundException($file);
        }
        
        include $file;
    }
}