<?php

/**
 * Description of cliente
 *
 * @author Ewerton
 */

class Cliente {
    private $idCliente;
    private $nascCliente;
    private $foneCliente;
    private $celCliente;
    private $endCliente;
    private $cidadeCliente;
    private $ufCliente;
    
    function getIdCliente() {
        return $this->idCliente;
    }

    function getNascCliente() {
        return $this->nascCliente;
    }

    function getFoneCliente() {
        return $this->foneCliente;
    }

    function getCelCliente() {
        return $this->celCliente;
    }

    function getEndCliente() {
        return $this->endCliente;
    }

    function getCidadeCliente() {
        return $this->cidadeCliente;
    }

    function getUfCliente() {
        return $this->ufCliente;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setNascCliente($nascCliente) {
        $this->nascCliente = $nascCliente;
    }

    function setFoneCliente($foneCliente) {
        $this->foneCliente = $foneCliente;
    }

    function setCelCliente($celCliente) {
        $this->celCliente = $celCliente;
    }

    function setEndCliente($endCliente) {
        $this->endCliente = $endCliente;
    }

    function setCidadeCliente($cidadeCliente) {
        $this->cidadeCliente = $cidadeCliente;
    }

    function setUfCliente($ufCliente) {
        $this->ufCliente = $ufCliente;
    }

    
        // funções criadas pelo lucas Angeli
    	public function adicionar($itens, $qtd){
		//os produtos da loja devem ter uma quantidade
		//tem que ter um if pra ver se o cliente nao esta adicionando mais do que esta disponivel
	}

	public function verCarrinho(){
		//vai mostrar os itens
		//depois de abrir o carrinho da pra remover os itens
	}

	public function remover($itens, $qtd){

	}

	public function cadastrarCliente(){
		//essa função é opcional
		//se o cliente adicionar os itens no carrinho e nao se cadastrar, vai ter um botao para ele se cadastrar no final
	}

	public function debitado($itens, $qtd){
		//multiplica itens*qtd
		//é a função que vai gerar a conta para o cliente
	}
    
           
}
