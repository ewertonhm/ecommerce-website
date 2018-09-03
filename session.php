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
	$resultado = mysqli_query($link, $query);
	$dados = mysqli_fetch_assoc($resultado);
	mysqli_close($link);
?>

<html>
	<head>
		<title>Pagina restrita</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Logado como: <?php echo $dados['nome'];?></h1>
		<a href="logout.php">Logout</a>
	</body>
</html>	