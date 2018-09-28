<?php   
        include_once 'db_connect.php';   
        
        
	function cleanstring($value){
    	$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    	$replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    	return str_replace($search, $replace, $value);
	}
        

        function sqltoarray($query){
            $consulta = pg_query($GLOBALS['sql'], $query);
            $resultado = pg_fetch_all($consulta);
            return $resultado;
        }
        
        function login($login,$senha){
            $senha = md5($senha);
            $consultasql = sqltoarray("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
            if($consultasql['0']['login'] == $login AND $consultasql['0']['senha'] == $senha):
                return true;
            else:
                return false;
            endif;
        }
        
        function loginGetid($login,$senha){
            $senha = md5($senha);
            $consultasql = sqltoarray("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
            if($consultasql['0']['login'] == $login AND $consultasql['0']['senha'] == $senha):
                return $consultasql['0']['id'];
            else:
                return false;
            endif;
        }
        function loginGetrole($login,$senha){
            $senha = md5($senha);
            $consultasql = sqltoarray("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
            if($consultasql['0']['login'] == $login AND $consultasql['0']['senha'] == $senha):
                return $consultasql['0']['role'];
            else:
                return false;
            endif;
        }
        function loginGetroleByid($id){
            $consultasql = sqltoarray("SELECT * FROM usuarios WHERE id = '$id'");
            if($consultasql['0']['id'] == $id):
                return $consultasql['0']['role'];
            else:
                return false;
            endif;
        }
        
        function getNomebySessionID(){
                $query = sqltoarray("SELECT * FROM usuarios WHERE id = '".$_SESSION['id_usuario']."'");
                return $query['0']['nome'];
        }
?>