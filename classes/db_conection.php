<?php


class db_conection {
    public $servername;
    public $username;
    public $password;
    public $db_name;
    public $port;

    //Setters
    public function setServername($servername){
        $this->servername = $servername;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setdbName($dbname){
        $this->db_name = $dbname;
    }
    public function setPort($port){
        $this->port = $port;
    }

        
    // Getters
    public function getServername(){
        return $this->servername;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getdbName(){
        return $this->db_name;
    }
    public function getPort(){
        return $this->port;
    }

    public function __construct(){
        $this->setServername("35.202.123.83");
        $this->setUsername("postgres");
        $this->setPassword("k#c+wiv@");
        $this->setdbName("database");
        $this->setPort("5432");
    }
    
    public function connect(){
        try {
            $dsn = "pgsql:host=.$this->getServername().;port=.$this->getPort().;dbname=.$this->getdbName().;user=.$this->getUsername().;password=.$this->getPassword";
            echo $dsn;
            $pdo = new PDO($dsn);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Conection Failed: ".$e->getMessage();
        }

    }
    
    
}
