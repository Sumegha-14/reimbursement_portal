<?php
class payment
{
    private $conn;
    private $table='payment1';
    
    public $id;
    public $amount;

    public function __construct($db){
        $this->conn=$db;
    }

    public function read(){
        $query='SELECT
                 p.id,
                 p.amount
            FROM 
                '.$this->table.' p';
                 
        $stmt  = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}