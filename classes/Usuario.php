<?php


/**
 * Description of usuario
 *
 * @author Ewerton
 */

require_once 'DB.php';

class Usuario{
    public  $nomeUsuario, $loginUsuario, $emailUsuario;
    private  $roleUsuario;
    protected $idUsuario, $cpfUsuario, $dbUsuario, $tabelaUsuario;

    public function __construct() {
        $this->setRoleUsuario('cliente');
        $this->tabelaUsuario = 'usuarios';
        $this->dbUsuario = DB::get_instance();
    }
    
    public function admin() {
        $this->setRoleUsuario('ADM');
    }
    
    
    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getLoginUsuario() {
        return $this->loginUsuario;
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getRoleUsuario() {
        return $this->roleUsuario;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getCpfUsuario() {
        return $this->cpfUsuario;
    }

    function getDbUsuario() {
        return $this->dbUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setRoleUsuario($roleUsuario) {
        $this->roleUsuario = $roleUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setCpfUsuario($cpfUsuario) {
        $this->cpfUsuario = $cpfUsuario;
    }

    function setDbUsuario($dbUsuario) {
        $this->dbUsuario = $dbUsuario;
    }
        
           
}
