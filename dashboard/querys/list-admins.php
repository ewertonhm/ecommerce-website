<?php
    require_once '..\..\db_connect.php';

    $query = "SELECT usuarios.id, usuarios.nome, usuarios.login, usuarios.email, dadosUsuarios.cpf FROM usuarios
    INNER JOIN dadosUsuarios ON usuarios.id = dadosUsuarios.cod_usuario WHERE usuarios.role = 'ADM';";
    $resultado_usuario = pg_query($dbconn, $query);
    $usr = pg_fetch_all($resultado_usuario);

    foreach($usr as $usuarios):
        echo "ID: ".$usuarios['id']." | Nome: ".$usuarios['nome']." | Login: ".$usuarios['login']." | Email: ".$usuarios['email']." | CPF: ".$usuarios['cpf'];
    endforeach;    
?>