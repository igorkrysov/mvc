<?php

namespace App\Controllers;

use App\Utility\View;

class HelloWorldController extends Controller {
    
    public function index() {
        //echo "<br><b>Hello World Controller + Index method</b><br>";
        return new View('HelloWorld/index.php', ['param1' => 'paramVal1']);
    }
}