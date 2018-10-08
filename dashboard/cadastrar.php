<?php
	// Page Title
	$page_title = 'Cadastro Admin';

	
	// Conexão 
	require_once '../db_connect.php';

	// Sessão
	session_start();

	// Include
	include "../functions.php";
        
        // Classes
        require_once '../classes/Usuario.php';
        require_once '../classes/Cliente.php';

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-cadastrar'])):
            if(loginGetroleByid($_SESSION['id_usuario']) != 'ADM'):
                    $erros[] = "<li> Acesso negado.</li>";
            else:
		//array para salvar as mensagens de erro
		$erros = array();
                // passa os dados vindos do $_POST em suas respectivas variaveis
        
                // Estancia os objetos
                $usuario = new usuario();
                $dadosUsuario = new dadosUsuarios();
                $usuario->admin();
                
                $usuario->setNome(cleanstring($_POST['nome']));
                $usuario->setLogin(cleanstring($_POST['login']));
                $usuario->setSenha(cleanstring($_POST['senha']));
                $usuario->setEmail(cleanstring($_POST['email']));
                $dadosUsuario->setCpf(cleanstring($_POST['cpf']));
                $dadosUsuario->setDatadenasc(cleanstring($_POST['bdate']));
                $dadosUsuario->setTelefone(cleanstring($_POST['telefone']));
                $dadosUsuario->setCelular(cleanstring($_POST['celular']));
                $dadosUsuario->setEndereco(cleanstring($_POST['endereco']));
                $dadosUsuario->setCidade(cleanstring($_POST['cidade']));
                $dadosUsuario->setEstado(cleanstring($_POST['estado']));
                $dadosUsuario->setNome($usuario->getNome());


        //echo $nome.$email.$cpf.$bdate.$celular.$login.$senha;
        // verifica se as variaveis (campos) estão vazias
        if(empty($usuario->getLogin()) or empty($usuario->getSenha()) or empty($usuario->getEmail()) or empty($dadosUsuario->getCpf()) or empty($dadosUsuario->getCelular()) or empty($dadosUsuario->getNome())):  
			$erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe (melhorar) *****************************
            //$query = "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
			$resultado = sqltoarray("SELECT * FROM usuarios WHERE login = '".$usuario->getLogin()."'");
			if($resultado['0']['login'] == $usuario->getLogin()):
				$erros[] = "<li> Login já cadastrado. </li>";
			elseif($resultado['0']['email'] == $usuario->getEmail()):
				$erros[] = "<li> Email já cadastrado. </li>";
			elseif($resultado['0']['cpf'] == $dadosUsuario->getCpf()):
				$erros[] = "<li> CPF já cadastrado. </li>";
            else:
                // insere os dados no banco
			    $usuario->setSenha(md5($usuario->getSenha()));
			    $query = "INSERT INTO usuarios (nome, login, senha, email, role) 
                            VALUES ('".$usuario->getNome()."','".$usuario->getLogin()."','".$usuario->getSenha()."','".$usuario->getEmail()."','".$usuario->getRole()."');";
			    if(pg_query($dbconn, $query)):
					$resultado = sqltoarray("SELECT * FROM usuarios WHERE login = '".$usuario->getLogin()."'");
					$dadosUsuario->setId($resultado['0']['id']);
					$query = "INSERT INTO dadosUsuarios(nome, cpf, datadenasc, telefone, celular, endereco, cidade, estado, cod_usuario)
					VALUES ('".$dadosUsuario->getNome()."', '".$dadosUsuario->getCpf()."','".$dadosUsuario->getDatadenasc()."', '".$dadosUsuario->getTelefone()."','".$dadosUsuario->getCelular()."','".$dadosUsuario->getEndereco()."','".$dadosUsuario->getCidade()."','".$dadosUsuario->getEndereco()."','".$dadosUsuario->getId()."')";
					if(pg_query($dbconn, $query)):		
						$erros[] = "<li> Cadastro realizado com sucesso.</li>";
					else:
						$erros[] = "<li> Erro inesperado [COD=223]. </li>";
					endif;		
                else:
					$erros[] = "<li> Erro inesperado [COD=222]. </li>";
                endif;    
            endif;
		endif;	
	endif;
        endif;
?>
<!-- <html> -->
<?php 
	include "../includes/top-dashboard.php";
	include "../includes/navbar-dashboard.php";	
?>
<!-- <body> -->
	<div class="container">
		<?php
			// se existir erros, exibe
			if(!empty($erros)):
				foreach ($erros as $erro):
					echo $erro;
				endforeach;
			endif;	
		?>

		<table style="width:100%">
			<form class="form-control-plaintext" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table class="table">
				<thead>
					<tr>
						<div class="text-center">
							<h1> Cadastro </h1>
						</div>
					<tr>
				</thead>
				<tbody>
					<tr>
						<td>Nome: <input class="form-text" type="text" name="nome"></td>
						<td>Login: <input class="form-text" type="text" name="login"></td>
						<td>CPF: <input class="form-text" type="float" name="cpf"></td>
					</tr>
					<tr>
						<td>Email: <input class="form-text" type="email" name="email"></td>
						<td>Senha: <input class="form-text" type="password" name="senha"></td>
						<td>Data de Nascimento: <input class="form-text" type="date" name="bdate"></td>
					</tr>
					<tr>
						<td>Telefone: <input class="form-text" type="text" name="telefone"></td>
						<td>Endereço: <input class="form-text" type="text" name="endereco"></td>
						<td>Estado: <input class="form-text" type="text" name="estado"></td>
					</tr>
					<tr>
						<td>Celular: <input class="form-text" type="text" name="celular"></td>
						<td>Cidade: <input class="form-text" type="text" name="cidade"></td>
						<td></td>
					</tr>
				</tbody>			
			</table>
			<div class="text-center">
			<br><br>
			<button class="btn btn-lg btn-primary" type="submit" name="btn-cadastrar">Cadastrar</button>
			</div>
		</form>
	</div>
<!-- </body> -->
<?php include "../includes/bottom-dashboard.php";?>
<!-- </html> -->
