<?php

class User
{
    private $conn;
    private $table = "users";

    public $us_id;
    public $name;
    public $email;
    public $password;
    public $age;
    public $type;

    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function GetUserByEmail()
    {
        $query = 'Select * from  ' . $this->table . ' where email = ? ';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam( 1, $this->email, PDO::PARAM_STR);
        // Execute query
        $stmt->execute();
        return $stmt;
    }


    public function read() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' ';

        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
    }




    public function GetUserByName()
    {
        $query = 'Select * from  ' . $this->table . ' where name = ? ';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam( 1, $this->name, PDO::PARAM_STR);
        // Execute query
        $stmt->execute();
        return $stmt;
    }
}

