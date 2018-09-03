<?php 
	// Variaveis de conexão
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "database";

	// Conexão com o banco de dados
	$link = mysqli_connect($servername, $username, $password, $db_name);

	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	//else:
	//	echo 'Ok';
	endif;	
 ?>