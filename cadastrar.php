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
		$login = cleanstring($_POST['login']);
        $senha = cleanstring($_POST['senha']);
        $email = cleanstring($_POST['email']);
        $cpf = cleanstring($_POST['cpf']);
		$bdate = cleanstring($_POST['bdate']);
		$telefone = cleanstring($_POST['telefone']);
        $celular = cleanstring($_POST['celular']);
        $endereco = cleanstring($_POST['endereco']);
        $cidade = cleanstring($_POST['cidade']);
		$estado = cleanstring($_POST['estado']);
		$role = 'cliente';


        //echo $nome.$email.$cpf.$bdate.$celular.$login.$senha;
        // verifica se as variaveis (campos) estão vazias
        if(empty($login) or empty($senha) or empty($email) or empty($cpf) or empty($celular) or empty($nome)):  
			$erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe (melhorar) *****************************
            //$query = "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
            $query = "SELECT * FROM usuarios WHERE login = '$login'";
			$consulta_usuario = pg_query($dbconn, $query);
			$resultado = pg_fetch_all($consulta_usuario);
			if($resultado['0']['login'] == $login):
				$erros[] = "<li> Login já cadastrado. </li>";
			elseif($resultado['0']['email'] == $email):
				$erros[] = "<li> Email já cadastrado. </li>";
			elseif($resultado['0']['cpf'] == $cpf):
				$erros[] = "<li> CPF já cadastrado. </li>";
            else:
                // insere os dados no banco
			    $senha = md5($senha);
			    $query = "INSERT INTO usuarios (nome, login, senha, email, role) 
                            VALUES ('$nome','$login','$senha','$email','$role');";
			    if(pg_query($dbconn, $query)):
					$query = "SELECT * FROM usuarios WHERE login = '$login'";
					$consulta_usuario = pg_query($dbconn, $query);
					$resultado = pg_fetch_all($consulta_usuario);
					$id = $resultado['0']['id'];
					$query = "INSERT INTO dadosUsuarios(nome, cpf, datadenasc, telefone, celular, endereco, cidade, estado, cod_usuario)
					VALUES ('$nome', '$cpf','$bdate', '$telefone','$celular','$endereco','$cidade','$estado','$id')";
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
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8">
   		<!-- Bootstrap CSS -->
		<link href="node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">
		<!-- Jquery JS -->	
		<script src="node_modules/jquery/jquery.js"></script>
		<!-- Popper JS -->
		<script src="node_modules/popper.js/dist/popper.js"></script>
		<!-- Bootstrap JS -->
		<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
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
			Login: <input type="text" name="login"><br>
			Senha: <input type="password" name="senha"><br>
            Email: <input type="email" name="email"><br>
            CPF: <input type="float" name="cpf"><br>
            Data de Nascimento: <input type="date" name="bdate"><br>
			Telefone: <input type="text" name="telefone"><br>
            Celular: <input type="text" name="celular"><br>
            Endereço: <input type="text" name="endereco"><br>
			Cidade: <input type="text" name="cidade"><br>
            Estado: <input type="text" name="estado"><br>



			<button type="submit" name="btn-cadastrar">Cadastrar</button>
		</form>
	</body>	
</html>	