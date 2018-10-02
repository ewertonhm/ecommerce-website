<?php


/**
 * Description of usuario
 *
 * @author Ewerton
 */

require_once 'cliente.php';

class Usuario extends Cliente{
    private $idUsuario;
    private $nomeUsuario;
    private $cpfUsuario;
    private $loginUsuario;
    private $senhaUsuario;
    private $emailUsuario;
    private $roleUsuario;
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getCpfUsuario() {
        return $this->cpfUsuario;
    }

    function getLoginUsuario() {
        return $this->loginUsuario;
    }

    function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getRoleUsuario() {
        return $this->roleUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setCpfUsuario($cpfUsuario) {
        $this->cpfUsuario = $cpfUsuario;
    }

    function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setRoleUsuario($roleUsuario) {
        $this->roleUsuario = $roleUsuario;
    }

    
    public function __construct() {
        $this->setRoleUsuario('cliente');
    }
    
    public function admin() {
        $this->setRoleUsuario('ADM');
    }
    
           
}
