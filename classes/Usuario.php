<?php


/**
 * Description of usuario
 *
 * @author Ewerton
 */

require_once 'cliente.php';

class Usuario extends Cliente{
    private $id;
    private $nome;
    private $cpf;
    private $login;
    private $senha;
    private $email;
    private $role;
    
    
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getRole() {
        return $this->role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRole($role) {
        $this->role = $role;
    }

    public function __construct() {
        $this->setRole('cliente');
    }
    
    public function admin() {
        $this->setRole('ADM');
    }
    
           
}
