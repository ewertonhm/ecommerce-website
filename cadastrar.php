<?php
	// Conexão 
	require_once 'db_connect.php';

	// Sessão
	session_start();

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-entrar'])):
		//array para salvar as mensagens de erro
		$erros = array();
        // passa os dados vindos do $_POST em suas respectivas variaveis
        $nome = mysqli_escape_string($link, $_POST['nome']);
        $email = mysqli_escape_string($link, $_POST['email']);
        $cpf = mysqli_escape_string($link, $_POST['cpf']);
        $bdate = mysqli_escape_string($link, $_POST['bdate']);
        $celular = mysqli_escape_string($link, $_POST['celular']);
        $endereco = mysqli_escape_string($link, $_POST['endereco']);
        $login = mysqli_escape_string($link, $_POST['login']);
        $senha = mysqli_escape_string($link, $_POST['senha']);

        //echo $nome.$email.$cpf.$bdate.$celular.$login.$senha;
        // verifica se as variaveis (campos) estão vazias
        //if(empty($login) or empty($senha) or empty($email) or empty($cpf) or empty($celular) or empty($nome)):
        if(empty($login) or empty($senha) or empty($nome)):    
			$erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe (melhorar) ******************************
            //$query = "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
            $query = "SELECT * FROM usuarios WHERE login = '$login'";
			$consulta_usuario = mysqli_query($link, $query);
			$resultado = mysqli_fetch_assoc($consulta_usuario);
			if(isset($resultado)):
				$erros[] = "<li> Email ou senha ou CPF ja cadastrado </li>";
            else:
                // insere os dados no banco
			    $senha = md5($senha);
			    $query = "  INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `bdate`, `celular`, `endereco`, `login`, `senha`) 
                            VALUES (NULL, '$nome', '$cpf', '$email', '$bdate', '$celular', '$endereco', '$login','$senha');";
			    if(mysqli_query($link, $query)):
			    //$resultado = mysqli_fetch_assoc($cadastrar_usuario);
                $erros[] = "<li> Cadastro realizado com sucesso</li>";
                else:
                    echo "deu ruim";
                endif;    
            endif;
		endif;	
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1> Cadastro </h1>
		<?php
			// se existir erros, exibe
			if(!empty($erros)):
				foreach ($erros as $erro):
					echo $erro;
				endforeach;
			endif;	
		?>
		<hr>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Nome: <input type="text" name="nome"><br>
            Email: <input type="email" name="email"><br>
            CPF: <input type="float" name="cpf"><br>
            Data de Nascimento: <input type="date" name="bdate"><br>
            Celular: <input type="text" name="celular"><br>
            Endereço: <input type="text" name="endereco"><br>
            Login: <input type="text" name="login"><br>
			Senha: <input type="password" name="senha"><br>
			<button type="submit" name="btn-entrar">Cadastrar</button>
		</form>
	</body>	
</html>	