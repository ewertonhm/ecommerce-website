<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrinho
 *
 * @author Ewerton
 */
require_once 'Produto.php';

class Carrinho extends Produto{
    public $itemsCarrinho;
    private $contadorArray;
    
    public function __construct() {
        $this->itemsCarrinho = array(['item' =>1,'qtd' =>1]);
        $this->contadorArray = 0;
    }
    
    function getItemCarrinho($index) {
        return $this->itemsCarrinho["$index"]['item'];
    }
    function getQtdCarrinho($index) {
        return $this->itemsCarrinho["$index"]['qtd'];
    }
    function getContadorArray(){
        return $this->contadorArray;
    }
    function setContadorArray($valor){
        $this->contadorArray = $valor;
    }
    
    function setItemsCarrinho($itemId,$qtd) {
        $this->setContadorArray($this->getContadorArray()+1);
        $this->itemsCarrinho["'".$this->getContadorArray()."'"]['item'] = $itemId;
        $this->itemsCarrinho["'".$this->getContadorArray()."'"]['qtd'] = $qtd;
    }


}
