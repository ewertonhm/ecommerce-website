<?php
	// Titul da Pagina
	$page_title = 'Dashboard';

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

<!-- <html> -->
<?php 
	include "../includes/top-dashboard.php";
	include "../includes/navbar.php";	
?>
<!-- <body> -->
        <?php
            require_once 'usercount.php';
        ?>
        <a href="querys\list-client.php">Listar Clientes</a> |
        <a href="querys\list-admins.php">Listar Administradores</a> |
        <a href="querys\list-allusers.php">Listar Todos</a>
        <br>
        <a href="logout.php">Logout</a>
<!-- </body> -->
<?php include "../includes/bottom.php";?>
<!-- </html> -->