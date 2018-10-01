<?php

/**
 * Description of cliente
 *
 * @author Ewerton
 */
class cliente {
    private $id;
    private $datadenasc;
    private $telefone;
    private $celular;
    private $endereco;
    private $cidade;
    private $estado;
    private $cod_usuario;
    
    function getId() {
        return $this->id;
    }

    function getDatadenasc() {
        return $this->datadenasc;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCod_usuario() {
        return $this->cod_usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDatadenasc($datadenasc) {
        $this->datadenasc = $datadenasc;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
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
