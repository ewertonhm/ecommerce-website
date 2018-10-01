<?php

require_once "pessoa.php";

class Cliente extends Pessoa {

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

	public function Cliente($nome, $cpf, $email, $endereco, $cidade, $uf){
    $this->setNome($nome);
    $this->setCpf($cpf);
    $this->setEmail($email);
    $this->setEndereco($endereco);
    $this->setCidade($cidade);
    $this->setUf($uf);   
  }
}

/*
$cliente3 = new Cliente("Tonho", "24242424", "tonho@tonho.com", "Rua dos Bandeirantes", "Uniao da vitoria", "PR");
echo "O nome do cliente eh: " . $cliente3->getNome();
echo "<br>CPF: " . $cliente3->getCPF();
echo "<br>Email: " . $cliente3->getEmail();
echo "<br>Endereço: " . $cliente3->getEndereco();
echo "<br>Cidade: " . $cliente3->getCidade();
echo "<br>Estado: " . $cliente3->getUf();
*/

//fazer metodo construtor para gerar novos clientes

//$cliente1->setNome("Emanuel");
//echo "O nome do cliente eh: {$cliente1->getNome()}";

?>


	