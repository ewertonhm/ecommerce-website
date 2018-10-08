<?php

require_once 'DB.php';

class Midia{
	public $_siglaMidia, $_nomeMidia, $_descricaoMidia; 
	private $_idMidia, $_tabelaMidia, $_dbMidia;
        
        public function __construct($id = '',$sigla = '',$nome = '',$descricao = '') {
            $this->set_siglaMidia($sigla);
            $this->set_nomeMidia($nome);
            $this->set_idMidia($id);
        }
        
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

