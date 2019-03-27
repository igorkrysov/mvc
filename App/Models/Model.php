<?php

namespace App\Models;

use Exception;
use PDO;

class Model {
    protected $PDO = null;
    protected $connection = null;
    protected $host = null;
    protected $port = null;
    protected $db = null;
    protected $user = null;
    protected $password = null;
    
    public function __construct() {        
        $this->connection = getenv('DB_CONNECTION');
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->db = getenv('DB_DATABASE');
        $this->user = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
    }

    public function connect() {
        var_dump($this->connection);
        $driver_options = null;
        if ($this->connection == 'mysql') {

        } else {
            throw new Exception("We don't support this driver yet: " . $this->connection);
        }
        $dsn = "mysql:dbname=$this->db;host=$this->host;port=$this->port;dbname=$this->db";
        $this->PDO = new PDO($dsn, $this->user, $this->password, $driver_options);
    }
}