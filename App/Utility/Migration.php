<?php

namespace App\Utility;

use Exception;
use PDO;

abstract class Migration {
    // CREATE TABLE `mvc`.`test` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

    protected $PDO = null;
    protected $connection = null;
    protected $host = null;
    protected $port = null;
    protected $db = null;
    protected $user = null;
    protected $password = null;

    protected $engine = "InnoDB";

    protected $query = "";

    protected $fields = [];

    protected function table($table) {
        $this->connection = getenv('DB_CONNECTION');
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->db = getenv('DB_DATABASE');
        $this->user = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');

        $this->query = "CREATE TABLE `". $this->db ."`.`" . $table . "` (";
    }

    protected function text($name, $canNull = false) {
        $field = "`" . $name . "` TEXT";

        if ($canNull) {
            $field .= " NULL";
        } else {
            $field .= " NOT NULL";
        }
        $this->fields[] = $field;        
    }

    protected function int($name, $canNull = false, $ai = false) {
        $field = "`" . $name . "` INT";

        if ($canNull) {
            $field .= " NULL";
        } else {
            $field .= " NOT NULL";
        }

        if ($ai) {
            $field .= " AUTO_INCREMENT";
        }
        $this->fields[] = $field;        
    }

    protected function primary($name) {
        $this->fields[] = "PRIMARY KEY (`" . $name . "`)";
    }

    protected function prepareQuery() {        

        $this->query .= implode(", ", $this->fields);
        $this->query .= ") ENGINE = " . $this->engine;
    }

    protected function run() {
        $this->prepareQuery();
        //echo "\n\nQUERY: $this->query\n\n";

       if ($this->query == "") {
           throw new Exception("Wrong query: " . $this->query);
       }
       $this->connection = getenv('DB_CONNECTION');
       $this->host = getenv('DB_HOST');
       $this->port = getenv('DB_PORT');
       $this->db = getenv('DB_DATABASE');
       $this->user = getenv('DB_USERNAME');
       $this->password = getenv('DB_PASSWORD');

       if ($this->connection == 'mysql') {

        } else {
            throw new Exception("We don't support this driver yet: " . $this->connection);
        }
        $driver_options = null;
        $dsn = "mysql:dbname=$this->db;host=$this->host;port=$this->port;dbname=$this->db";
        $this->PDO = new PDO($dsn, $this->user, $this->password, $driver_options);
        $stmt = $this->PDO->prepare($this->query);
        $stmt->execute();
   }

   abstract public function start();
}