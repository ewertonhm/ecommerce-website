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
