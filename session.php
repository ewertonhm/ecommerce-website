<?php
	/* Essa pagina serve apenar para fins de testes e deve ser removida antes de passar para a branch master do projeto. */
	// Conexão
	require_once 'db_connect.php';

	// Sessão
	session_start();

	// Verifica se o usuario está logado, caso não, redireciona para login.php
	if(!isset($_SESSION['logado'])):
		header('location: login.php');
	endif;	

	// Dados
	$id = $_SESSION['id_usuario'];
	$query = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = pg_query($dbconn, $query);
	$dados = pg_fetch_all($resultado);
	pg_close($dbconn);
?>

<html>
	<head>
		<title>Pagina restrita</title>
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
		<h1>Logado como: <?php echo $dados['0']['nome'];?></h1>
		<a href="logout.php">Logout</a>
	</body>
</html>	