<?php 
	// Variaveis de conexão
	$servername = "localhost";
	$username = "postgres";
	$password = "postgres";
	$db_name = "database";
	$port = "5432";
	$appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	// Conexão com o banco de dados
	$db_string = "host=$servername port=$port dbname=$db_name user=$username password=$password options='--application_name=$appName'";
	$dbconn = pg_connect($db_string);
        $GLOBALS['sql'] = pg_connect($db_string);
 ?>