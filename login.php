<?php
	// Conexão 
	require_once 'db_connect.php';

	// Sessão
	session_start();

	// Include
	include "functions.php";

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-entrar'])):
		//array para salvar as mensagens de erro
		$erros = array();
		// passa os dados vindos do $_POST em suas respectivas variaveis
		$login = cleanstring($_POST['login']);
		$senha = cleanstring($_POST['senha']);

		// verifica se as variaveis (campos) estão vazias
		if(empty($login) or empty($senha)):
			$erros[] = "<li> O campo login e senha precias ser preenchido </li>";
		else:
			$senha = md5($senha);
			$query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
			$resultado_usuario = pg_query($dbconn, $query);
			$resultado = pg_fetch_all($resultado_usuario);
			if($resultado['0']['login'] == $login AND $resultado['0']['senha'] == $senha):
				pg_close($dbconn);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $resultado['0']['id'];
				// Alterar futuramente para a pagina do usuario ou pagina home, momentaneamente em uma pagina de testes.
				header('Location: session.php');

			else:
				$erros[] = "<li> Usuário ou senha incorreto</li>";
			endif;	
		endif;	
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	</head>
	<body>
		<h1> Login </h1>
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
			Login: <input type="text" name="login"><br>
			Senha: <input type="password" name="senha">
			<button type="submit" name="btn-entrar">Login</button>
		</form>
	</body>	
</html>	