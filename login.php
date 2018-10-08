<?php
    require_once 'classes/_classes.php';
    include_once 'lib.php';
        
    if(!isset($_SESSION)):
        session_start();
    endif;
        
    if(isset($_POST['btn-entrar'])){
        //array para exibir os avisos
        $erros = array();
            
        if(empty(cleanstring($_POST['login'])) OR empty(cleanstring($_POST['senha']))){
            $erros[] = "<li> O campo login e senha precias ser preenchido </li>";
        } else {
            $usuario = new Usuario();
            if($usuario->logar(cleanstring($_POST['login']),cleanstring($_POST['senha']))){
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $usuario->get_idUsuario();
                if(!empty($_POST["remember"])){
                    setcookie("login",$_POST["login"],time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie("senha",$_POST["senha"],time()+ (10 * 365 * 24 * 60 * 60));                        
                } else {
                    if(isset($_COOKIE["login"])){
                        setcookie("login","");
                    }
                    if(isset($_COOKIE["senha"])){
                        setcookie("senha","");	
                    }
                }
                header('session.php');
            } else {
                $erros[] = "<li> Usuário ou senha incorretos</li>";
            }
        }   
    }        
?>

<!-- <html> -->
<?php topLogin('Login');?>
<!-- <body> -->
    <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="text-center mb-4">
      	    <img class="mb-4" src="https://png.icons8.com/nolan/96/000000/musical-notes.png" alt="" width="72" height="72">
	    <h1 class="h3 mb-3 font-weight-normal">Entrar na sua conta</h1>
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
<?php bottomLogin();?>