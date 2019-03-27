<?php

namespace App\Exceptions;

use Exception;

class FileNotFoundException extends Exception {
    
    /**
     * File not found
     * @var String
     */
    private $fileTarget;

    /**
     * 
     *  
     */    

    public function __construct($file) {
        $this->fileTarget = $file;
    }

    public function errorMessage() {
        var_dump("errorMessage");
       $msg = '<b>File not found: '. $this->fileTarget . '</b><br>Error on line ' . 
                $this->getLine() . ' in ' . $this->getFile() . ': <b>' . 
                $this->getMessage() . '</b>';
       return $msg;
    }

    public function __toString() {
        return "File not found: " . $this->fileTarget;
    }
}