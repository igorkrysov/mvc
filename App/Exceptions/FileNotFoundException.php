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

    public function __toString() {
        return "File not found: " . $this->fileTarget;
    }
}