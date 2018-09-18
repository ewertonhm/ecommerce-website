<?php
	/* Essa pagina serve apenar para fins de testes e deve ser removida antes de passar para a branch master do projeto. */
	// Conexão
	require_once '..\db_connect.php';

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
?>

<html>
	<head>
		<title>Painel de Controle</title>
		<meta charset="utf-8">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	</head>
    <header>
        <h1>Logado como: <?php echo $dados['0']['nome'];?></h1>
    </header>
	<body>
        <?php
            require_once 'usercount.php';
        ?>
        <a href="querys\list-client.php">Listar Clientes</a> |
        <a href="querys\list-admins.php">Listar Administradores</a> |
        <a href="querys\list-allusers.php">Listar Todos</a>
        <br>
        <a href="logout.php">Logout</a>
	</body>
</html>	