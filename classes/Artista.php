<?php

/**
 * Description of Artista
 *
 * @author Ewerton
 */

require_once 'DB.php';

class Artista {
    public $_nomeArtista;
    private $_dbArtista, $_tabelaArtista, $_idArtista;
    
    public function __construct($nome = '',$id = '') {
        $this->set_idArtista($id);
        $this->set_nomeArtista($nome);
        $this->set_tabelaArtista('artista');
        $this->_dbArtista = DB::get_instance();
    }
    
    public function criar_artista(){
        $artista = ['nome'=>$this->get_nomeArtista()];
        $this->_dbArtista->insert($this->get_tabelaArtista(),$artista);
        $this->set_idArtista($this->_dbArtista->get_lastInsertID());
    }
    public function editar_artista(){
        $Artista = ['nome'=>$this->get_nomeArtista()];
        $this->_dbArtista->update($this->get_tabelaArtista(),$this->get_idArtista(),$Artista);
    }
    public function excluir_artista(){
        $this->_db->delete($this->get_tabelaArtista(),$this->get_idArtista());
    }
    
    public function ler_artista(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_idArtista()],
        ];
        $dados = $this->_dbArtista->findFirst($this->get_tabelaArtista(),$params);
        $this->set_nomeArtista($dados->nome);
    }
    
    
    function get_nomeArtista() {
        return $this->_nomeArtista;
    }

    function get_tabelaArtista() {
        return $this->_tabelaArtista;
    }

    function get_idArtista() {
        return $this->_idArtista;
    }

    function set_nomeArtista($_nomeArtista) {
        $this->_nomeArtista = $_nomeArtista;
    }

    function set_tabelaArtista($_tabelaArtista) {
        $this->_tabelaArtista = $_tabelaArtista;
    }

    function set_idArtista($_idArtista) {
        $this->_idArtista = $_idArtista;
    }


}
