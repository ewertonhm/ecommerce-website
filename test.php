<?php
	// Conexão 
	require_once 'db_connect.php';

	// Sessão
    session_start();
    
            $nome = 'Administrador';
            $email = 'admin@admin.com';
            $cpf = '000.000.000-00';
            $bdate = '01-01-1900';
            $celular = '00-000000000';
            $endereco = 'xxxxxxx xxxxxxxxx xxxxxxxxx';
            $login = 'admin';
            $senha = '123456';
            
            $query = "SELECT * FROM 'usuarios' WHERE login = '$login'";
			$consulta_usuario = mysqli_query($link, $query);
			$resultado = mysqli_fetch_assoc($consulta_usuario);
			if(isset($resultado)):
				$erros[] = "<li> Email ou login ou CPF ja cadastrado </li>".$resultado['email'].$resultado['login'].$resultado['cpf'];
            else:
                // insere os dados no banco
			    $senha = md5($senha);
			    $query = "  INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `bdate`, `celular`, `endereco`, `login`, `senha`) 
                            VALUES (NULL, '$nome', '$cpf', '$email', '$bdate', '$celular', '$endereco', '$login','$senha');";
			    if(mysqli_query($link, $query)):
                $erros[] = "<li> Cadastro realizado com sucesso</li>";
                else:
                    echo "deu ruim";
                endif;    
            endif;

