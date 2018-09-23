<?php
	// Page Title
	$page_title = 'Cadastro';
	
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
            // melhorar, utilizar filter_input() com filter type validate para validar os dados ************ 
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
          
            // verifica se as variaveis (campos) estão vazias
            if(empty($login) or empty($senha) or empty($email) or empty($cpf) or empty($celular) or empty($nome)):  
                $erros[] = "<li> Todos os campos devem ser preenchidos. </li>";
            else:
                // verificar se o usuario ja existe (melhorar) *****************************
                //testar: "SELECT * FROM usuarios WHERE login = '$login' OR email = '$email' OR cpf = '$cpf'";
                $consultasql = sqltoarray("SELECT * FROM usuarios WHERE login = '$login'");
                if($consultasql['0']['login'] == $login):
                    $erros[] = "<li> Login já cadastrado. </li>";
                elseif($consultasql['0']['email'] == $email):
                    $erros[] = "<li> Email já cadastrado. </li>";
                elseif($consultasql['0']['cpf'] == $cpf):
                    $erros[] = "<li> CPF já cadastrado. </li>";
                else:
                    // insere os dados no banco
                    $senha = md5($senha);
                    $query = "INSERT INTO usuarios (nome, login, senha, email, role) VALUES ('$nome','$login','$senha','$email','$role');";
                    if(pg_query($dbconn, $query)):
                        $consultasql = sqltoarray("SELECT * FROM usuarios WHERE login = '$login'");
                        $id = $consultasql['0']['id'];
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
<!-- <html> -->
<?php 
	include "includes/top.php";
	include "includes/navbar.php";	
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
                    <button class="btn btn-lg btn-primary" type="submit" name="btn-entrar">Cadastrar</button>
                </div>
            </form>  
    </div>

<!-- </body> -->
<?php include "includes/bottom-login.php";?>
<!-- </html> -->
