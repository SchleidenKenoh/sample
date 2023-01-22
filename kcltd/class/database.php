<?php


class Database{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'kcltd';


    protected $connection = '';


    function connect(){
        try{

            $this->connection = new PDO("mysql:host = $this->host;dbname=$this->database", $this->username, $this->password);

        }catch(PDOExceptions $e) {
            echo 'Connection error ' . $e->getMessage();
        }
        return $this->connection;
    }
}