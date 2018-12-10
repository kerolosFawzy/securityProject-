<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 12/8/2018
 * Time: 5:58 PM
 */

class Product
{

    private $conn;
    private $table = "products";

    public $pro_id;
    public $pro_amount;
    public $pro_price;
    public $pro_name;
    public $pro_producer_id;


    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function GetPriceByName()
    {
        $query = 'Select * from  ' . $this->table . ' where pro_name = ? ';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam( 1, $this->pro_name, PDO::PARAM_STR);
        // Execute query
        $stmt->execute();
        return $stmt;
    }

}