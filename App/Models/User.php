<?php

namespace App\Models;

use Exception;

class User extends Model {

    public function getUsers() {
        if (is_null($this->PDO)) {
            throw new Exception('PDO is null');
        }

        $stmt = $this->PDO->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = $row['name'];
        }

        return $users;
    }
}