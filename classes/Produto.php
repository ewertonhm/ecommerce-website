<?php

require_once 'Midia.php';
require_once 'Album.php';
require_once 'DB.php';


class Produto {
    public $_nomeProduto, $_precoProduto, $_estoqueProduto;
    private $_idProduto, $_dbProduto, $_tabelaProduto, $_midia, $_album;
    
    private function Midia($id){
        $this->_midia = new Midia($id);
        $this->_midia->ler_midia();
    }
    
    private function Album($id){
        $this->_album = new Album($id);
        $this->_album->ler_album();
    }
    
    function __construct($midia,$album,$id = '',$nome = '',$preco = '',$estoque = '') {
        $this->set_idProduto($id);
        $this->set_nomeProduto($nome);
        $this->set_precoProduto($preco);
        $this->set_estoqueProduto($estoque);
        $this->set_tabelaProduto('produto');
        $this->_dbProduto = DB::get_instance();
        
        if($midia != NULL){
            $this->Midia($midia);
        }
        
        if($album != NULL){
            $this->Album($album);
        }
    }
    
    function criar_produto(){
        $produto = [
            'nome'=>$this->get_nomeProduto(),
            'preco'=> $this->get_precoProduto(),
            'estoque'=>$this->get_estoqueProduto(),
            'cod_midia'=>$this->get_idMidia(),
            'cod_album'=>$this->get_idAlbum()
        ];
        $this->_dbProduto->insert($this->get_tabelaProduto(),$produto);
        $this->set_idProduto($this->_dbProduto->get_lastInsertID());
    }
    
    function editar_produto(){
        $produto = [
            'nome'=>$this->get_nomeProduto(),
            'preco'=> $this->get_precoProduto(),
            'estoque'=>$this->get_estoqueProduto(),
            'cod_midia'=>$this->get_idMidia(),
            'cod_album'=>$this->get_idAlbum()
        ];
        $this->_dbProduto->update($this->get_tabelaProduto(),$this->get_idProduto(),$produto);
    }
    
    function excluir_produto(){
        $this->_dbProduto->delete($this->get_tabelaProduto(),$this->get_idProduto());
    }
    
    function ler_produto(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_idAlbum()],
        ];
        $dados = $this->_dbProduto->findFirst($this->get_tabelaProduto(),$params);
        $this->set_estoqueProduto($dados->estoque);
        $this->set_nomeProduto($dados->nome);
        $this->set_precoProduto($dados->nome);
        $this->Album($dados->cod_album);
        $this->Midia($dados->cod_midia);
    }


    // getter e setters
    function get_nomeProduto() {
        return $this->_nomeProduto;
    }

    function get_precoProduto() {
        return $this->_precoProduto;
    }

    function get_estoqueProduto() {
        return $this->_estoqueProduto;
    }

    function get_idProduto() {
        return $this->_idProduto;
    }

    function get_tabelaProduto() {
        return $this->_tabelaProduto;
    }

    function set_nomeProduto($_nomeProduto) {
        $this->_nomeProduto = $_nomeProduto;
    }

    function set_precoProduto($_precoProduto) {
        $this->_precoProduto = $_precoProduto;
    }

    function set_estoqueProduto($_estoqueProduto) {
        $this->_estoqueProduto = $_estoqueProduto;
    }

    function set_idProduto($_idProduto) {
        $this->_idProduto = $_idProduto;
    }

    function set_tabelaProduto($_tabelaProduto) {
        $this->_tabelaProduto = $_tabelaProduto;
    }

}

