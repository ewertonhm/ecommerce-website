<?php       
            require_once '..\db_connect.php';
            $query = "SELECT * FROM usuarios";
            $resultado = pg_query($dbconn, $query);
            $dados = pg_fetch_all($resultado);
            $total = count($dados);
            echo "<p> Usuarios cadastrados: $total</p>";
            $query = "SELECT * FROM usuarios WHERE role='ADM'";
            $resultado = pg_query($dbconn, $query);
            $dados = pg_fetch_all($resultado);
            $total = count($dados);
            echo "<p> Administradores: $total</p>";
            $query = "SELECT * FROM usuarios WHERE role!='ADM'";
            $resultado = pg_query($dbconn, $query);
            $dados = pg_fetch_all($resultado);
            $total = count($dados);
            echo "<p> Clientes: $total</p>";
        ?>