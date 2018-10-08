<?php
    // iniciar sessão
    if(!isset($_SESSION)):
        session_start();
    endif;
    
    // Include
    include_once 'lib.php';
    require_once 'classes/_classes.php';

    // Verificar se o botão ja foi clicado
    if(isset($_POST['btn-cadastrar'])):
	//array para salvar as mensagens de erro
	$erros = array();
        
        $usuario = new Usuario();
                
        $usuario->setNomeUsuario(cleanstring($_POST['nome']));
        $usuario->setLoginUsuario(cleanstring($_POST['login']));
        $usuario->setSenhaUsuario(md5(cleanstring($_POST['senha'])));
        $usuario->setEmailUsuario(cleanstring($_POST['email']));
        $usuario->setCpfUsuario(cleanstring($_POST['cpf']));

        // verifica se as variaveis (campos) estão vazias
        if(empty($usuario->getLoginUsuario()) or empty($usuario->getSenhaUsuario()) or empty($usuario->getEmailUsuario()) or empty($usuario->getCpfUsuario()) or empty($usuario->getNomeUsuario())):  
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
                $usuario->criar_usuario();
                $usuario->Cliente(
                        cleanstring($_POST['bdate']),
                        cleanstring($_POST['telefone']),
                        cleanstring($_POST['celular']),
                        cleanstring($_POST['endereco']),
                        cleanstring($_POST['cidade']),
                        cleanstring($_POST['estado']));
                $usuario->criar_cliente();
                $erros[] = "<li> Cadastro realizado com sucesso.</li>";                
            }
        endif; 
    endif;    
    
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
                    </tr>
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
