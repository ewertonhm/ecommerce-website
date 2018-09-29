<form method="POST">
	<label>Cadastro de clientes:</label><br>
	Nome:<input type="text" name="nome"><br>
	CPF:<input type="number" name="cpf"><br>
	Email:<input type="email" name="email"><br>
	Endereço:<input type="text" name="endereco"><br>
	Cidade:<input type="text" name="cidade"><br>
	Estado:<input type="text" name="uf"><br>
	<button type="submit" id="btn">Cadastrar Cliente</button>
</form>pg_

<?php

if(isset($_POST['btn'])) {
	$nome=$_POST['nome'];
	$cpf=$_POST['cpf'];
	$email=$_POST['email'];
	$endereco=$_POST['endereco'];
	$cidade=$_POST['cidade'];
	$estado=$_POST['uf'];

	$insert=pg_query("insert into clientes (nome, cpf, email, endereco, cidade, uf)
						values('$nome', '$cpf', '$email', '$endereco', '$cidade', '$uf')
						");
	elseif (!@$inserir) {
		echo "Erro ao salvar os dados";
	}
}

?>