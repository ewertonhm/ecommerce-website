<?php


class db_conection {
    private $servername;
    private $username;
    private $password;
    private $db_name;
    private $port;
    private $appName;
    private $conectado;
    public $conection;
    
    //Setters
    private function setServername($servername){
        $this->servername = $servername;
    }
    private function setUsername($username){
        $this->username = $username;
    }
    private function setPassword($password){
        $this->password = $password;
    }
    private function setdbName($dbname){
        $this->db_name = $dbname;
    }
    private function setPort($port){
        $this->port = $port;
    }
    private function setAppname($name){
        $this->appName = $name;
    }
    private function setConectado($status){
        $this->conectado = $status;
    }
    private function setConection($conection){
        $this->conection = $conection;
    }
    
    // Getters
    private function getServername(){
        return $this->servername;
    }
    private function getUsername(){
        return $this->username;
    }
    private function getPassword(){
        return $this->password;
    }
    private function getdbName(){
        return $this->db_name;
    }
    private function getPort(){
        return $this->port;
    }
    private function getappName(){
        return $this->appName;
    }
    private function getConectado(){
        return $this->conectado;
    }
    public function getConection(){
        return $this->conection;
    }
    
    
    public function __construct(){
        $this->setServername("localhost");
        $this->setUsername("postgres");
        $this->setPassword("postgres");
        $this->setdbName("database");
        $this->setPort("5432");
        $this->setAppname($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $this->setConection("$this->servername $this->port $this->db_name $this->username $this->password options='--application_name=$this->appName");
    }
    
}
