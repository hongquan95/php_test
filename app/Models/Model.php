<?php
namespace App\Models;

use PDO;

class Model
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    public $table;
    public function __construct($servername, $username, $password, $dbname, $table)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }
    public function connect()
    {
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function disconnect() {
        $this->conn = null;
    }
    public function insert($params)
    {
        $keys = '('.implode(array_keys($params), ',').')';
        $values = '('.implode(array_values($params), ',').')';
        $sql = "INSERT INTO $this->tabke $keys
        VALUES $values";
        $this->conn->exec($sql);
        $this->disconnect();
    }
    public function all($sql)
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute();
        $this->disconnect();
        return $res;
    }
    public function update($sql)
    {
            // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        $this->disconnect();
    }
    public function delete($sql)
    {
        $this->conn->exec($sql);
        $this->disconnect();
    }
}
