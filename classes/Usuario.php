<?php
/**
 * Description of usuario
 *
 * @author Ewerton
 */
require_once 'DB.php';
require_once 'Cliente.php';

class Usuario{
    public $_nomeUsuario, $_loginUsuario, $_emailUsuario;
    private $_roleUsuario, $_senhaUsuario, $_cliente;
    protected $_idUsuario, $_cpfUsuario, $_dbUsuario, $_tabelaUsuario;

    public function __construct() { 
        $this->set_roleUsuario('cliente');
        $this->set_tabelaUsuario('usuarios');
        $this->_dbUsuario = DB::get_instance();
    }
    
    public function Cliente($nasc = '',$fone = '',$cel = '',$endereco = '',$cidade = '',$uf = ''){
        $this->_cliente = new Cliente($this->get_idUsuario());
        $this->_cliente->set_nascCliente($nasc);
        $this->_cliente->set_foneCliente($fone);
        $this->_cliente->set_celCliente($cel);
        $this->_cliente->set_endCliente($endereco);
        $this->_cliente->set_cidadeCliente($cidade);
        $this->_cliente->set_ufCliente($uf);
    }
    public function criar_cliente(){
        $this->_cliente->criar_cliente();
    }

    public function logar($login,$senha){
        $this->set_loginUsuario(md5($login));
        $this->set_senhaUsuario($senha);
        $parametros = [
            'conditions' => ['login = ?','senha = ?'],
            'bind' => [$this->get_loginUsuario(),$this->get_senhaUsuario()]
        ];
        $consulta = $this->_dbUsuario->find('usuarios',$parametros);
        if($consulta['0']->login == $this->get_loginUsuario() AND $consulta['0']->senha == $this->get_senhaUsuario()){
            $this->set_idUsuario($consulta['0']->id);
            $this->set_nomeUsuario($consulta['0']->nome);
            $this->set_roleUsuario($consulta['0']->role);
            $this->set_emailUsuario($consulta['0']->email);
            $this->set_cpfUsuario($consulta['0']->cpf);
            return true;
        } else {
            return false;
        }            
    }
    
    public function criar_usuario(){
        $usuario = [
            'nome'=>$this->get_nomeUsuario(),
            'cpf'=>$this->get_cpfUsuario(),
            'login'=>$this->get_senhaUsuario(),
            'senha'=>$this->get_senhaUsuario(),
            'email'=>$this->get_emailUsuario(),
            'role'=>$this->get_roleUsuario()
        ];
        $this->_dbUsuario->insert($this->get_tabelaUsuario(),$usuario);
        $this->set_idUsuario($this->_dbUsuario->get_lastInsertID());
    }
    
    public function editar_usuario(){
        $usuario = [
            'nome'=>$this->get_nomeUsuario(),
            'cpf'=>$this->get_cpfUsuario(),
            'login'=>$this->get_senhaUsuario(),
            'senha'=>$this->get_senhaUsuario(),
            'email'=>$this->get_emailUsuario(),
            'role'=>$this->get_roleUsuario()
        ];
        $this->_dbUsuario->udate($this->get_tabelaUsuario(),$this->get_idUsuario(),$usuario);  
    }
    

    public function excluir_usuario(){
        $this->_dbUsuario->delete($this->get_tabelaUsuario(), $this->get_idUsuario());
    }
    
    public function ler_usuario($id){
        $parametros = [
            'conditions' => ['id = ?'],
            'bind' => [$id]
        ];
        $consulta = $this->_dbUsuario->find('usuarios',$parametros);
        $this->set_nomeUsuario($consulta->nome);
        $this->set_roleUsuario($consulta->role);
        $this->set_emailUsuario($consulta->email);
        $this->set_cpfUsuario($consulta->cpf);
    }
    
    
    public function admin() {
        $this->set_roleUsuario('ADM');
    }
    
    
    function get_nomeUsuario() {
        return $this->_nomeUsuario;
    }

    function get_loginUsuario() {
        return $this->_loginUsuario;
    }

    function get_emailUsuario() {
        return $this->_emailUsuario;
    }

    function get_senhaUsuario() {
        return $this->_senhaUsuario;
    }

    function get_idUsuario() {
        return $this->_idUsuario;
    }

    function get_cpfUsuario() {
        return $this->_cpfUsuario;
    }

    function get_tabelaUsuario() {
        return $this->_tabelaUsuario;
    }

    function set_nomeUsuario($_nomeUsuario) {
        $this->_nomeUsuario = $_nomeUsuario;
    }

    function set_loginUsuario($_loginUsuario) {
        $this->_loginUsuario = $_loginUsuario;
    }

    function set_emailUsuario($_emailUsuario) {
        $this->_emailUsuario = $_emailUsuario;
    }

    function set_senhaUsuario($_senhaUsuario) {
        $this->_senhaUsuario = $_senhaUsuario;
    }

    function set_idUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
    }

    function set_cpfUsuario($_cpfUsuario) {
        $this->_cpfUsuario = $_cpfUsuario;
    }

    function set_tabelaUsuario($_tabelaUsuario) {
        $this->_tabelaUsuario = $_tabelaUsuario;
    }
    function get_roleUsuario() {
        return $this->_roleUsuario;
    }

    function set_roleUsuario($_roleUsuario) {
        $this->_roleUsuario = $_roleUsuario;
    }


}
