<?php
	// Conexão 
	require_once 'db_connect.php';

	// Sessão
	session_start();

	// Include
	include "functions.php";

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-cadastrar'])):
		//array para salvar as mensagens de erro
		$erros = array();
        // passa os dados vindos do $_POST em suas respectivas variaveis
        $nome = cleanstring($_POST['nome']);
        $email = cleanstring($_POST['email']);
        $cpf = cleanstring($_POST['cpf']);
        $bdate = cleanstring($_POST['bdate']);
        $celular = cleanstring($_POST['celular']);
        $endereco = cleanstring($_POST['endereco']);
        $login = cleanstring($_POST['login']);
        $senha = cleanstring($_POST['senha']);

        //echo $nome.$email.$cpf.$bdate.$celular.$login.$senha;
        // verifica se as variaveis (campos) estão vazias
        //if(empty($login) or empty($senha) or empty($email) or empty($cpf) or empty($celular) or empty($nome)):
        if(empty($login) or empty($senha) or empty($nome) or empty($email)):    
			$erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe (melhorar) ******************************
            //$query = "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
            $query = "SELECT * FROM usuarios WHERE login = '$login'";
			$consulta_usuario = pg_query($dbconn, $query);
			$resultado = pg_fetch_all($consulta_usuario);
			if($resultado['0']['login'] == $login):
				$erros[] = "<li> Login já cadastrado </li>";
			elseif($resultado['0']['email'] == $email):
				$erros[] = "<li> Email já cadastrado </li>";
			elseif($resultado['0']['cpf'] == $cpf):
				$erros[] = "<li> CPF já cadastrado </li>";
            else:
                // insere os dados no banco
			    $senha = md5($senha);
			    $query = "INSERT INTO usuarios (nome, email, cpf, bdate, celular, endereco, login, senha) 
                            VALUES ('$nome', '$cpf', '$email', '$bdate', '$celular', '$endereco', '$login','$senha');";
			    if(pg_query($dbconn, $query)):
			    //$resultado = pg_fetch_all($cadastrar_usuario);
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
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
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
			<button type="submit" name="btn-cadastrar">Cadastrar</button>
		</form>
	</body>	
</html>	