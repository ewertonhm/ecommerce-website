<?php
	// Titul da Pagina
	$page_title = 'Dashboard Login';

	// Conexão 
	require_once '..\db_connect.php';

	// Sessão
	session_start();

	// Include
	include '..\functions.php';

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
				    // remember-me e cookies setup
				    if(!empty($_POST["remember"])):
					    setcookie ("login",$_POST["login"],time()+ (10 * 365 * 24 * 60 * 60));
					    setcookie ("senha",$_POST["senha"],time()+ (10 * 365 * 24 * 60 * 60));
				    else:
					    if(isset($_COOKIE["login"])):
						    setcookie ("login","");
					    endif;
					    if(isset($_COOKIE["senha"])):
						    setcookie ("senha","");	
					    endif;	
                    endif;   	
				// Alterar futuramente para a pagina do usuario ou pagina home, momentaneamente em uma pagina de testes.
                if($resultado['0']['role'] != 'ADM'):
                    $erros[] = "<li> Acesso negado.</li>";
                else:
                    header('Location: index.php');
                endif; 
			else:
				$erros[] = "<li> Usuário ou senha incorreto</li>";
			endif;	
		endif;	
	endif;
?>
<!-- <html> -->
<?php include "../includes/top-login-dashboard.php";?>
<!-- <body> -->
		<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="text-center mb-4">
				<img class="mb-4" src="https://png.icons8.com/nolan/96/000000/musical-notes.png" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Painel de Controle</h1>
				<?php
					// se existir erros, exibe
					if(!empty($erros)):
						foreach ($erros as $erro):
							echo $erro;
						endforeach;
					endif;	
				?>
			</div>	
			<label for="login" class="sr-only">Login</label>
			<input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
      		<label for="password" class="sr-only">Senha</label>
      		<input type="password" id="password" name="senha" class="form-control" placeholder="Senha" required>
      		<div class="checkbox mb-3">
        		<label>
          			<input type="checkbox" name="remember" value="remember-me"> Lembrar me
        		</label>
        	<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-entrar">Entrar</button>
      		<p class="mt-5 mb-3 text-muted">&copy; 2018</p>	
      		</div>
		</form>
<?php include "../includes/bottom-dashboard-login.php";?>