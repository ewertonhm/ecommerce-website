<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produto
 *
 * @author Prof Arquimedes
 */
require_once 'Album.php';

trait Midia {    
    	public $idMidia;
        public $nomeMidia;
        public $siglaMidia;
        public $descricaoMidia;
        
        //Getters 
        function getIdMidia() {
            return $this->idMidia;
        }

        function getNomeMidia() {
            return $this->nomeMidia;
        }

        function getSiglaMidia() {
            return $this->siglaMidia;
        }

        function getDescricaoMidia() {
            return $this->descricaoMidia;
        }
        
        //Setters
        function setIdMidia($idMidia) {
            $this->idMidia = $idMidia;
        }

        function setNomeMidia($nomeMidia) {
            $this->nomeMidia = $nomeMidia;
        }

        function setSiglaMidia($siglaMidia) {
            $this->siglaMidia = $siglaMidia;
        }

        function setDescricaoMidia($descricaoMidia) {
            $this->descricaoMidia = $descricaoMidia;
        }        
}

class Produto extends Album {
    
    use Midia;
    
    public $idProduto;
    public $nomeProduto;
    public $precoProduto;
    public $estoqueProduto;
    
    // Getters
    function getIdProduto() {
        return $this->idProduto;
    }

    function getNomeProduto() {
        return $this->nomeProduto;
    }

    function getPrecoProduto() {
        return $this->precoProduto;
    }

    function getEstoqueProduto() {
        return $this->estoqueProduto;
    }
    
    // Setter
    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    function setPrecoProduto($precoProduto) {
        $this->precoProduto = $precoProduto;
    }

    function setEstoqueProduto($estoqueProduto) {
        $this->estoqueProduto = $estoqueProduto;
    }



}

