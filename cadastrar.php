<?php
	// Page Title
	$page_title = 'Cadastro';

	
	// Conexão 
	require_once 'db_connect.php';

	// iniciar sessão
        if(!isset($_SESSION)):
            session_start();
        endif;
    
	// Include
	include "functions.php";
        
        // Classes
        require_once 'classes/Usuario.php';

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-cadastrar'])):
		//array para salvar as mensagens de erro
		$erros = array();
                // passa os dados vindos do $_POST em suas respectivas variaveis
        
                // Estancia os objetos
                $usuario = new Usuario();
                
                
                $usuario->setNomeUsuario(cleanstring($_POST['nome']));
                $usuario->setLoginUsuario(cleanstring($_POST['login']));
                $usuario->setSenhaUsuario(cleanstring($_POST['senha']));
                $usuario->setEmailUsuario(cleanstring($_POST['email']));
                $usuario->setCpfUsuario(cleanstring($_POST['cpf']));
                $usuario->setNascCliente(cleanstring($_POST['bdate']));
                $usuario->setFoneCliente(cleanstring($_POST['telefone']));
                $usuario->setCelCliente(cleanstring($_POST['celular']));
                $usuario->setEndCliente(cleanstring($_POST['endereco']));
                $usuario->setCidadeCliente(cleanstring($_POST['cidade']));
                $usuario->setUfCliente(cleanstring($_POST['estado']));


        //echo $nome.$email.$cpf.$bdate.$celular.$login.$senha;
        // verifica se as variaveis (campos) estão vazias
        if(empty($usuario->getLoginUsuario()) or empty($usuario->getSenhaUsuario()) or empty($usuario->getEmailUsuario()) or empty($usuario->getCpfUsuario()) or empty($usuario->getCelCliente()) or empty($usuario->getNomeUsuario())):  
			$erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe (melhorar) *****************************
            //$query = "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
			$resultado = sqltoarray("SELECT * FROM usuarios WHERE login = '".$usuario->getLoginUsuario()."'");
			if($resultado['0']['login'] == $usuario->getLoginUsuario()):
				$erros[] = "<li> Login já cadastrado. </li>";
			elseif($resultado['0']['email'] == $usuario->getEmailUsuario()):
				$erros[] = "<li> Email já cadastrado. </li>";
			elseif($resultado['0']['cpf'] == $usuario->getCpfUsuario()):
				$erros[] = "<li> CPF já cadastrado. </li>";
            else:
                // insere os dados no banco
			    $usuario->setSenhaUsuario(md5($usuario->getSenhaUsuario()));
			    $query = 
                                    "INSERT INTO usuarios (
                                        nome,
                                        cpf,
                                        login,
                                        senha,
                                        email,
                                        role
                                        ) VALUES ('"
                                            .$usuario->getNomeUsuario()."','"
                                            .$usuario->getCpfUsuario()."','"
                                            .$usuario->getLoginUsuario()."','"
                                            .$usuario->getSenhaUsuario()."','"
                                            .$usuario->getEmailUsuario()."','"
                                            .$usuario->getRoleUsuario()."');";
			    if(pg_query($dbconn, $query)):
					$resultado = sqltoarray("SELECT * FROM usuarios WHERE login = '".$usuario->getLoginUsuario()."'");
					$usuario->setIdUsuario($resultado['0']['id']);
					$query = 
                                        "INSERT INTO clientes(
                                            datadenasc,
                                            telefone,
                                            celular,
                                            endereco,
                                            cidade,
                                            estado,
                                            cod_usuario
                                            ) VALUES ('"
                                                    .$usuario->getNascCliente()."','"
                                                    .$usuario->getFoneCliente()."','"
                                                    .$usuario->getCelCliente()."','"
                                                    .$usuario->getEndCliente()."','"
                                                    .$usuario->getCidadeCliente()."','"
                                                    .$usuario->getUfCliente()."','"
                                                    .$usuario->getIdUsuario()."')";
                                        
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
<!-- <html> -->
<?php 
	include "includes/top.php";
	include "includes/navbar.php";	
?>
<!-- <body> -->
	<div class="container">
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
                        <?php
			// se existir erros, exibe
			if(!empty($erros)):
				foreach ($erros as $erro):
					echo $erro."<br>";
                                        
				endforeach;
			endif;	
                        ?>
			<button class="btn btn-lg btn-primary" type="submit" name="btn-cadastrar">Cadastrar</button>
			</div>
		</form>
	</div>
<!-- </body> -->
<?php include "includes/bottom.php";?>
<!-- </html> -->
