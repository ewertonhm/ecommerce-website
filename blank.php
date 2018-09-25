<?php
	// Titulo da Pagina
	$page_title = 'Title';
        
        include "classes/db_conection.php";
        $db = new db_conection();
        echo $db->getServername();
        $db->connect();
?>

<!-- <html> -->
<?php
    include "includes/top.php";
    include "includes/navbar.php";
?>
<!-- <body> -->
    <!-- CONTEUDO DO BODY AQUI -->
<!-- </body> -->
<?php include "includes/bottom.php";?>
<!-- </html> -->
