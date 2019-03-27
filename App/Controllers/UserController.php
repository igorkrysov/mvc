<?php

namespace App\Controllers;

use App\Utility\View;
use App\Models\User;

class UserController extends Controller {
    
    public function getUsers() {
        $user = new User();
        $user->connect();
        $users = $user->getUsers();
        return new View('User/list.php', ['users' => $users]);
    }
}