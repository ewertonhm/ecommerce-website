<?php
/**
 * Description of Genero
 *
 * @author Ewerton
 */
require_once 'DB.php';

class Genero {
    public $_descricaoGenero, $_nomeGenero;
    private $_dbGenero, $_tabelaGenero, $_idGenero;
    
    public function __construct($id = '',$nome = '',$descricao = '') {
        $this->set_idGenero($id);
        $this->set_nomeGenero($nome);
        $this->set_descricaoGenero($descricao);
        $this->_tabelaGenero = 'genero';
        $this->_dbGenero = DB::get_instance();
    }
    
    public function criar_genero(){
        $genero = ['nome'=>$this->get_nomeGenero(),'descricao'=>$this->get_descricaoGenero()];
        $this->_dbGenero->insert($this->get_tabelaGenero(),$genero);
        $this->set_idGenero($this->_dbGenero->get_lastInsertID());
    }
    public function editar_genero(){
        $genero = ['nome'=>$this->get_nomeGenero(),'descricao'=>$this->get_descricaoGenero()];
        $this->_dbGenero->update($this->get_tabelaGenero(),$this->get_idGenero(),$genero);
    }
    public function excluir_genero(){
        $this->_db->delete($this->get_tabelaGenero(),$this->get_idGenero());
    }
    
    public function ler_genero(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_idGenero()],
        ];
        $dados = $this->_dbGenero->findFirst($this->get_tabelaGenero(),$params);
        $this->set_nomeGenero($dados->nome);
        $this->set_descricaoGenero($dados->descricao);
    }
    
    // getter e setters
    function get_descricaoGenero() {
        return $this->_descricaoGenero;
    }

    function get_nomeGenero() {
        return $this->_nomeGenero;
    }

    function get_tabelaGenero() {
        return $this->_tabelaGenero;
    }

    function set_descricaoGenero($_descricaoGenero) {
        $this->_descricaoGenero = $_descricaoGenero;
    }

    function set_nomeGenero($_nomeGenero) {
        $this->_nomeGenero = $_nomeGenero;
    }

    function set_tabelaGenero($_tabela) {
        $this->_tabelaGenero = $_tabela;
    }
    function get_idGenero() {
        return $this->_idGenero;
    }

    function set_idGenero($_id) {
        $this->_idGenero = $_id;
    }

}
