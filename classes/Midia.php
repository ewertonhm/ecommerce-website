<?php

require_once 'DB.php';

class Midia{
	public $_siglaMidia, $_nomeMidia, $_descricaoMidia; 
	private $_idMidia, $_tabelaMidia, $_dbMidia;
        
        public function __construct($id = '',$sigla = '',$nome = '',$descricao = '') {
            $this->set_siglaMidia($sigla);
            $this->set_nomeMidia($nome);
            $this->set_descricaoMidia($descricao);
            $this->set_idMidia($id);
            $this->_dbMidia = DB::get_instance();
            $this->set_tabelaMidia('midia');
        }
        
        function criar_midia(){
            $midia = [
                'nome'=>$this->get_nomeMidia(),
                'sigla'=>$this->get_siglaMidia(),
                'descricao'=>$this->get_descricaoMidia()
                    ];
            $this->_dbMidia->insert($this->get_tabelaMidia(),$midia);
            $this->set_idMidia($this->_dbMidia->get_lastInsertID());
        }
        
        function editar_midia(){
            $midia = [
                'nome'=>$this->get_nomeMidia(),
                'sigla'=>$this->get_siglaMidia(),
                'descricao'=>$this->get_descricaoMidia()
                    ];
            $this->_dbMidia->update($this->get_tabelaMidia(), $this->get_idMidia(),$midia);            
        }
        
        function excluir_midia(){
            $this->_dbMidia->delete($this->get_tabelaMidia(), $this->get_idMidia());
        }
        
        function ler_midia(){
            $params = [
                'conditions' => ['id = ?'],
                'bind' => [$this->get_idArtista()],
                      ];
            $dados = $this->_dbMidia->findFirst($this->get_tabelaMidia(),$params);
            $this->set_nomeMidia($dados->nome);
            $this->set_siglaMidia($dados->sigla);
            $this->set_descricaoMidia($dados->descricao);
        }
        
        //Getters e Setter 
        
        function get_siglaMidia() {
            return $this->_siglaMidia;
        }

        function get_nomeMidia() {
            return $this->_nomeMidia;
        }

        function get_descricaoMidia() {
            return $this->_descricaoMidia;
        }

        function get_idMidia() {
            return $this->_idMidia;
        }

        function get_tabelaMidia() {
            return $this->_tabelaMidia;
        }

        function set_siglaMidia($_siglaMidia) {
            $this->_siglaMidia = $_siglaMidia;
        }

        function set_nomeMidia($_nomeMidia) {
            $this->_nomeMidia = $_nomeMidia;
        }

        function set_descricaoMidia($_descricaoMidia) {
            $this->_descricaoMidia = $_descricaoMidia;
        }

        function set_idMidia($_idMidia) {
            $this->_idMidia = $_idMidia;
        }

        function set_tabelaMidia($_tabelaMidia) {
            $this->_tabelaMidia = $_tabelaMidia;
        }

}

