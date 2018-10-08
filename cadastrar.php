<?php
	// iniciar sessão
        if(!isset($_SESSION)):
            session_start();
        endif;
    
	// Include
	include_once 'lib.php';
        require_once 'classes/Usuario.php';
        require_once 'classes/DB.php';

	// Verificar se o botão ja foi clicado
	if(isset($_POST['btn-cadastrar'])):
		//array para salvar as mensagens de erro
		$erros = array();
                // passa os dados vindos do $_POST em suas respectivas variaveis
        
                // Estancia os objetos
                $usuario = new Usuario();
                $db = DB::get_instance();
                
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

        // verifica se as variaveis (campos) estão vazias
        if(empty($usuario->getLoginUsuario()) or empty($usuario->getSenhaUsuario()) or empty($usuario->getEmailUsuario()) or empty($usuario->getCpfUsuario()) or empty($usuario->getCelCliente()) or empty($usuario->getNomeUsuario())):  
            $erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
        else:
            // verificar se o usuario ja existe
            if(verfExiste('Usuarios', 'login', $usuario->getLoginUsuario())){
                $erros[] = "<li> Login ja está em uso</li>";
            } elseif (verfExiste('Usuarios', 'email', $usuario->getEmailUsuario())) {
                $erros[] = "<li> Email ja está em uso</li>";            
            } elseif (verfExiste('Usuarios', 'cpf', $usuario->getCpfUsuario())) {
                $erros[] = "<li> CPF ja cadastrado</li>";            
            } else{
                // insere os dados no banco
		$usuario->setSenhaUsuario(md5($usuario->getSenhaUsuario()));
                $arrayusuario = [  
                    'nome'=>$usuario->getNomeUsuario(),
                    'cpf'=>$usuario->getCpfUsuario(),
                    'login'=>$usuario->getLoginUsuario(),
                    'senha'=>$usuario->getSenhaUsuario(),
                    'email'=>$usuario->getEmailUsuario(),
                    'role'=>$usuario->getRoleUsuario()
                        ];
                if($db->insert('usuarios',$arrayusuario)){
                    $usuario->setIdUsuario($db->get_lastInsertID());
                    $arraycliente = [
                        'datadenasc'=>$usuario->getNascCliente(),
                        'telefone'=>$usuario->getFoneCliente(),
                        'celular'=>$usuario->getCelCliente(),
                        'endereco'=>$usuario->getEndCliente(),
                        'cidade'=>$usuario->getCidadeCliente(),
                        'estado'=>$usuario->getUfCliente(),
                        'cod_usuario'=>$usuario->getIdUsuario()
                    ];
                    if($db->insert('clientes',$arraycliente)){
                        $erros[] = "<li> Cadastro realizado com sucesso.</li>";
                    } else {
                        $erros[] = "<li> Erro inesperado [COD=223]. </li>";
                    }
                } else {
                    $erros[] = "<li> Erro inesperado [COD=222]. </li>";
                }
                
            }
        endif; 
    endif;    
?>
<!-- <html> -->
<?php 
	top('Cadastrar');
	navbar();	
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
<?php bottom();?>
<!-- </html> -->
