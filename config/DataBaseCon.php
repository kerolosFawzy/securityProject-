<?php

class DataBaseCon
{
    private $host = "localhost";
    private $db_name = "id8152810_supermarket";
    private $user_name = "id8152810_root";
    private $password = "123456";
    private $conn;

    function connection()
    {
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user_name, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}