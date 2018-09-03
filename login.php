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
		$login = mysqli_escape_string($link, $_POST['login']);
		$senha = mysqli_escape_string($link, $_POST['senha']);

		// verifica se as variaveis (campos) estão vazias
		if(empty($login) or empty($senha)):
			$erros[] = "<li> O campo login e senha precias ser preenchido </li>";
		else:
			$senha = md5($senha);
			$query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
			$resultado_usuario = mysqli_query($link, $query);
			$resultado = mysqli_fetch_assoc($resultado_usuario);
			if(isset($resultado)):
				mysqli_close($link);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $resultado['id'];
				// Alterar futuramente para a pagina do usuario ou pagina home, momentaneamente em uma pagina de testes.
				header('Location: session.php');

			else:
				$erros[] = "<li> Usuário inexistente</li>";
			endif;	
		endif;	
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
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