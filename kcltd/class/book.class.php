<?php
require_once 'database.php';
class Book
{
    //attributes

    public $name;
    public $email;
    public $number;
    public $id;
    public $arrival;
    public $service;
    public $address;


    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add()
    {
        $sql = "INSERT INTO customers (name, email, number, address, arrival, service) VALUES
        (:name, :email, :number, :address, :arrival, :service);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':arrival', $this->arrival);
        $query->bindParam(':service', $this->service);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function edit()
    {
        $sql = "UPDATE `customers` SET `name`=:name,`email`=:email, number=:number ,`address`=:address, `arrival`=:arrival, `service`=:service WHERE id = :id;";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':arrival', $this->arrival);
        $query->bindParam(':service', $this->service);
        $query->bindParam(':id', $this->id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function fetch($record_id)
    {
        $sql = "SELECT * FROM customers WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if ($query->execute()) {
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id)
    {
        $sql = "DELETE FROM customers WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function show()
    {
        $sql = "SELECT * FROM customers ORDER BY CONCAT('name') ASC;";
        $query = $this->db->connect()->prepare($sql);
        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>