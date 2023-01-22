<?php
require_once 'database.php';
class Admin
{
    //attributes

    public $firstname;
    public $lastname;
    public $email;
    public $number;

    public $id;

    public $status = 'Inactive';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add()
    {
        $sql = "INSERT INTO admins (firstname, lastname, email, number, status) VALUES
        (:firstname, :lastname, :email, :number, :status);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':status', $this->status);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function edit()
    {
        $sql = "UPDATE `admins` SET `firstname`=:firstname,`lastname`=:lastname,`email`=:email, number=:number ,`status`=:status WHERE id = :id;";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function fetch($record_id)
    {
        $sql = "SELECT * FROM admins WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if ($query->execute()) {
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id)
    {
        $sql = "DELETE FROM admins WHERE id = :id;";
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
        $sql = "SELECT * FROM admins ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query = $this->db->connect()->prepare($sql);
        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
