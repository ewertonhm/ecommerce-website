<?php

require_once 'DB.php';

class Album{
    public $_nomeAlbum, $_anoAlbum, $_capaAlbum;
    private $_dbAlbum, $_tabelaAlbum, $_idAlbum;
    
    public function __construct($id = '', $nome = '', $ano = '') {
        $this->set_idAlbum($id);
        $this->set_nomeAlbum($nome);
        $this->set_anoAlbum($ano);
        $this->set_tabelaAlbum('album');
        $this->_dbAlbum = DB::get_instance();
    }
    
    public function capa_str(){
        
    }
    
    public function str_capa(){
        
    }

    public function criar_album(){
        $Album = ['nome'=>$this->get_nomeAlbum(),'ano'=>$this->get_anoAlbum()];
        $this->_dbAlbum->insert($this->get_tabelaAlbum(),$Album);
        $this->set_idAlbum($this->_dbAlbum->get_lastInsertID());
    }
    public function editar_album(){
        $Album = ['nome'=>$this->get_nomeAlbum(),'ano'=>$this->get_anoAlbum()];
        $this->_dbAlbum->update($this->get_tabelaAlbum(),$this->get_idAlbum(),$Album);
    }
    public function excluir_album(){
        $this->_dbAlbum->delete($this->get_tabelaAlbum(),$this->get_idAlbum());
    }
    
    public function ler_album(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_idAlbum()],
        ];
        $dados = $this->_dbAlbum->findFirst($this->get_tabelaAlbum(),$params);
        $this->set_nomeAlbum($dados->nome);
        $this->set_anoAlbum($dados->ano);
    }
    
    
    function get_nomeAlbum() {
        return $this->_nomeAlbum;
    }

    function get_tabelaAlbum() {
        return $this->_tabelaAlbum;
    }

    function get_idAlbum() {
        return $this->_idAlbum;
    }

    function set_nomeAlbum($_nomeAlbum) {
        $this->_nomeAlbum = $_nomeAlbum;
    }

    private function set_tabelaAlbum($_tabelaAlbum) {
        $this->_tabelaAlbum = $_tabelaAlbum;
    }

    private function set_idAlbum($_idAlbum) {
        $this->_idAlbum = $_idAlbum;
    }
    
    function get_anoAlbum() {
        return $this->_anoAlbum;
    }

    function set_anoAlbum($_anoAlbum) {
        $this->_anoAlbum = $_anoAlbum;
    }


}

?>