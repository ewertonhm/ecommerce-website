<?php

/**
 * Description of cliente
 *
 * @author Ewerton
 */

class Cliente {
    public $_idCliente, $_nascCliente, $_foneCliente, $_celCliente, $_endCliente, $_cidadeCliente, $_ufCliente;
    private $_dbCliente, $_tabelaCliente, $_idUsuario;
    
    public function __construct($id) {
        $this->set_tabelaCliente('clientes');
        $this->_dbCliente = DB::get_instance();
        $this->set_idUsuario($id);
    }
    

    public function ler_cliente_codusu(){
        $params = [
            'conditions' => ['cod_usuario = ?'],
            'bind' => [$this->get_idUsuario()],
        ];
        $dados = $this->_dbCliente->FindFirst($this->get_tabelaCliente(),$params);
        $this->set_idCliente($dados->id);
        $this->set_nascCliente($dados->nasc);
        $this->set_foneCliente($dados->fone);
        $this->set_celCliente($dados->cel);
        $this->set_endCliente($dados->endereco);
        $this->set_cidadeCliente($dados->cidade);
        $this->set_ufCliente($dados->uf);
    }
    
    public function ler_cliente_codcli(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_idCliente()],
        ];
        $dados = $this->_dbCliente->FindFirst($this->get_tabelaCliente(),$params);
        $this->set_nascCliente($dados->nasc);
        $this->set_foneCliente($dados->fone);
        $this->set_celCliente($dados->cel);
        $this->set_endCliente($dados->endereco);
        $this->set_cidadeCliente($dados->cidade);
        $this->set_ufCliente($dados->uf);
        $this->set_idCliente($dados->cod_usuario);
    }
    
    public function criar_cliente(){
        $cliente = [
            'nasc'=>$this->get_nascCliente(),
            'fone'=>$this->get_foneCliente(),
            'cel'=>$this->get_celCliente(),
            'endereco'=>$this->get_endCliente(),
            'cidade'=>$this->get_cidadeCliente(),
            'uf'=>$this->get_ufCliente(),
            'cod_usuario'=>$this->get_idUsuario()
        ];
        $this->_dbCliente->insert($this->get_tabelaCliente(),$cliente);
        $this->set_idCliente($this->_dbCliente->get_lastInsertID());
    }
    
    public function editar_cliente(){
        $cliente = [
            'nasc'=>$this->get_nascCliente(),
            'fone'=>$this->get_foneCliente(),
            'cel'=>$this->get_celCliente(),
            'endereco'=>$this->get_endCliente(),
            'cidade'=>$this->get_cidadeCliente(),
            'uf'=>$this->get_ufCliente(),
            'cod_usuario'=>$this->get_idUsuario()
        ];
        $this->_dbCliente->update($this->get_tabelaCliente(),$this->get_idCliente(),$cliente);
    }
    
    public function excluir_cliente(){
        $this->_dbCliente->delete($this->get_tabelaCliente(),$this->get_idCliente());
    }
            
    function get_idCliente() {
        return $this->_idCliente;
    }

    function get_nascCliente() {
        return $this->_nascCliente;
    }

    function get_foneCliente() {
        return $this->_foneCliente;
    }

    function get_celCliente() {
        return $this->_celCliente;
    }

    function get_endCliente() {
        return $this->_endCliente;
    }

    function get_cidadeCliente() {
        return $this->_cidadeCliente;
    }

    function get_ufCliente() {
        return $this->_ufCliente;
    }

    function get_tabelaCliente() {
        return $this->_tabelaCliente;
    }

    function get_idUsuario() {
        return $this->_idUsuario;
    }

    function set_idCliente($_idCliente) {
        $this->_idCliente = $_idCliente;
    }

    function set_nascCliente($_nascCliente) {
        $this->_nascCliente = $_nascCliente;
    }

    function set_foneCliente($_foneCliente) {
        $this->_foneCliente = $_foneCliente;
    }

    function set_celCliente($_celCliente) {
        $this->_celCliente = $_celCliente;
    }

    function set_endCliente($_endCliente) {
        $this->_endCliente = $_endCliente;
    }

    function set_cidadeCliente($_cidadeCliente) {
        $this->_cidadeCliente = $_cidadeCliente;
    }

    function set_ufCliente($_ufCliente) {
        $this->_ufCliente = $_ufCliente;
    }

    function set_tabelaCliente($_tabelaCliente) {
        $this->_tabelaCliente = $_tabelaCliente;
    }

    function set_idUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
    }
}
