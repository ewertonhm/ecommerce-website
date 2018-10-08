<?php   
        include_once 'classes/DB.php';
        $GLOBALS['sql'] = DB::get_instance();
        
        
        
	function cleanstring($value){
    	$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    	$replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    	return str_replace($search, $replace, $value);
	}
        
        /*
         * inutilizada
        function sqltoarray($query){
            $consulta = pg_query($GLOBALS['sql'], $query);
            $resultado = pg_fetch_all($consulta);
            return $resultado;
        }*/
        
        
        function login($login,$senha){
            $senha = md5($senha);
            $parametros = [
                'conditions' => ['login = ?','senha = ?'],
                'bind' => [$login,$senha]
            ];
            $consultasql = $GLOBALS['sql']->find('usuarios',$parametros);
            if($consultasql['0']->login == $login AND $consultasql['0']->senha == $senha){
                return true;
            } else{
                return false;
            }
        }
        function loginGetid($login,$senha){
            $senha = md5($senha);
            $parametros = [
                'conditions' => ['login = ?', 'senha = ?'],
                'bind' => [$login,$senha]
            ];
            $consultasql = $GLOBALS['sql']->find('usuarios',$parametros);
            $id = $consultasql['0']->id;
            return $id;
        }
        function loginGetroleByid($id){
            $parametros = [
                'conditions' => ['id = ?'],
                'bind' => [$id]
            ];
            $consultasql = $GLOBALS['sql']->find('usuarios',$parametros);
            $role = $consultasql['0']->role;
            return $role;
        }
        function loginGetrole($login,$senha){
            $senha = md5($senha);
            $parametros = [
                'conditions' => ['login = ?', 'senha = ?'],
                'bind' => [$login,$senha]
            ];
            $consultasql = $GLOBALS['sql']->find('usuarios',$parametros);
            $role = $consultasql['0']->role;
            return $role;
        }
        function getNomebySessionID(){
            $parametros = [
                'conditions' => ['id = ?'],
                'bind' => [$_SESSION['id_usuario']]
            ];
            $consultasql = $GLOBALS['sql']->find('usuarios',$parametros);
            $nome = $consultasql['0']->nome;
            return $nome;
        }
        
        function verfExiste($tabela,$campo,$dado){
            $parametros = [
                'conditions' => ["$campo = ?"],
                'bind' => [$dado]
            ];
            $consultasql = $GLOBALS['sql']->findFirst($tabela,$parametros);
            if(is_object($consultasql)){
                if($consultasql->$campo == $dado){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        
        /*function loginGetid($login,$senha){
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
        }*/
        
        function top($pagetitle){
            	echo "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <title>$pagetitle</title>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                    <meta name='description' content=''>
                    <meta name='author' content='Ewerton H Marschalk'>
                    <link rel='icon' href='https://png.icons8.com/nolan/50/000000/musical-notes.png'>
                    <!-- Bootstrap CSS -->
                    <link href='node_modules/bootstrap/compiler/bootstrap.css' rel='stylesheet'>
                    <!-- Bootstrap Custom CSS -->
                    <link href='node_modules/bootstrap/compiler/styles.css' rel='stylesheet'>
                </head>
                <body>";
        }
        
        function topLogin($pagetitle){
            	echo "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                        <title>$pagetitle</title>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <meta name='description' content=''>
                        <meta name='author' content='Ewerton H Marschalk'>
                        <link rel='icon' href='https://png.icons8.com/nolan/50/000000/musical-notes.png'>
                        <!-- Bootstrap CSS -->
                        <link href='node_modules/bootstrap/compiler/bootstrap.css' rel='stylesheet'>
                        <!-- Bootstrap Custom CSS -->
                        <link href='node_modules/bootstrap/compiler/styles.css' rel='stylesheet'>
                        <link href='node_modules/bootstrap/compiler/login.css' rel='stylesheet'>
                </head>
                <body class='text-center'>";
        }
        
        function topDashboard($pagetitle){
            	echo "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                        <title>$pagetitle</title>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <meta name='description' content=''>
                        <meta name='author' content='Ewerton H Marschalk'>
                        <link rel='icon' href='https://png.icons8.com/nolan/50/000000/musical-notes.png'>
                        <!-- Bootstrap CSS -->
                        <link href='../node_modules/bootstrap/compiler/bootstrap.css' rel='stylesheet'>
                        <!-- Bootstrap Custom CSS -->
                        <link href='../node_modules/bootstrap/compiler/styles.css' rel='stylesheet'>
                </head>
                <body>";
        }
        
        function topLoginDashboard($pagetitle){            
	echo "
            <!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                    <title>$pagetitle</title>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                    <meta name='description' content=''>
                    <meta name='author' content='Ewerton H Marschalk'>
                    <link rel='icon' href='https://png.icons8.com/nolan/50/000000/musical-notes.png'>
                    <!-- Bootstrap CSS -->
                    <link href='../node_modules/bootstrap/compiler/bootstrap.css' rel='stylesheet'>
                    <!-- Bootstrap Custom CSS -->
                    <link href='../node_modules/bootstrap/compiler/styles.css' rel='stylesheet'>
                    <link href='../node_modules/bootstrap/compiler/login.css' rel='stylesheet'>
            </head>
            <body class='text-center'>";
        }
        
        function navbar(){
        // iniciar sessão
        if(!isset($_SESSION)):
             session_start();
        endif;
            // variaveis navbar
             // Nome da Pagina
             //$pagetitle = "Puro Som"; // pode se alterar a imagem por esta variavel
             // link ao clicar no nome da pagina
             $pagetitlelink = $_SERVER['PHP_SELF'];  
             // Texto Menu 1
             $textomenu1 = "Pagina Inicial";
             // Link Menu 1
             $linkmenu1 ="home.php";
             // Texto Menu 2
             $textomenu2 = "Catalogo";
             // Link Menu 2
             $linkmenu2 = "#";
             // Texto Menu 3
             $textomenu3 = "Promoções";
             // Link Menu 3
             $linkmenu3 = "#";
             // Texto Dropdown (futuramente exibir o nome do usuario logado ou Logar-se nesse campo)
             if(isset($_SESSION['logado'])):
                $dropdownname = getNomebySessionID();
                // Texto Dropdown Menu 1
                $textdropdown1 = "Minha Conta";
                // Link Dropdown Menu 1
                $linkdropdown1 = "session.php";
                // Texto Dropdown Menu 2
                $textdropdown2 = "Meus Pedidos";
                // Link Dropdown Menu 2
                $linkdropdown2 = "pedidos.php";
                // Texto Dropdown Menu 3
                $textdropdown3 = "Sair";
                // Link Dropdown Menu 3
                $linkdropdown3 = "logout.php";
        else:        	
        $dropdownname = "Area do Usuario";
        // Texto Dropdown Menu 1
        $textdropdown1 = "Cadastrar";
        // Link Dropdown Menu 1
        $linkdropdown1 = "cadastrar.php";
        // Texto Dropdown Menu 2
        $textdropdown2 = "Entrar";
        // Link Dropdown Menu 2
        $linkdropdown2 = "login.php";
        // Texto Dropdown Menu 3
        $textdropdown3 = "Sair";
        // Link Dropdown Menu 3
        $linkdropdown3 = "logout.php";
        endif;
        echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
            <div class ='container'>
            <a class='navbar-brand mb-0' href='$pagetitlelink'>
                <img class='mb-0' src='https://png.icons8.com/nolan/96/000000/musical-notes.png' alt='' width='30' height='30'>
            </a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu1'>$textomenu1<span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu2'>$textomenu2</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu3'>$textomenu3</a>
                    </li>
                </ul>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            $dropdownname
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <a class='dropdown-item' href='$linkdropdown1'>$textdropdown1</a>
                            <a class='dropdown-item' href='$linkdropdown2'>$textdropdown2</a>
                            <a class='dropdown-item' href='$linkdropdown3'>$textdropdown3</a>
                        </div>
                    </li>
                </ul>
                <form class='form-inline'>
                    <input class='form-control ml-4 mr-2' type='search' placeholder='Buscar'>
                    <button class='btn btn-default' type='submit'>Ok</button>
                </form>
            </div>
            </div>
        </nav>
        ";
        }
        
        function navbarDashboard(){
        // iniciar sessão
        if(!isset($_SESSION)):
             session_start();
         endif;
        // variaveis navbar
        // Nome da Pagina
        // $pagetitle = "Puro Som";
        // link ao clicar no nome da pagina
        $pagetitlelink = $_SERVER['PHP_SELF'];  
        // Texto Menu 1
        $textomenu1 = "Pagina Inicial";
        // Link Menu 1
        $linkmenu1 ="home.php";
        // Texto Menu 2
        $textomenu2 = "Catalogo";
        // Link Menu 2
        $linkmenu2 = "#";
        // Texto Menu 3
        $textomenu3 = "Promoções";
        // Link Menu 3
        $linkmenu3 = "#";
        // Texto Dropdown (futuramente exibir o nome do usuario logado ou Logar-se nesse campo)
        if(isset($_SESSION['logado'])):
                $dropdownname = getNomebySessionID();
                // Texto Dropdown Menu 1
                $textdropdown1 = "Minha Conta";
                // Link Dropdown Menu 1
                $linkdropdown1 = "session.php";
                // Texto Dropdown Menu 2
                $textdropdown2 = "Meus Pedidos";
                // Link Dropdown Menu 2
                $linkdropdown2 = "pedidos.php";
                // Texto Dropdown Menu 3
                $textdropdown3 = "Sair";
                // Link Dropdown Menu 3
                $linkdropdown3 = "logout.php";
        else:        	
        $dropdownname = "Area do Usuario";
        // Texto Dropdown Menu 1
        $textdropdown1 = "Cadastrar";
        // Link Dropdown Menu 1
        $linkdropdown1 = "cadastrar.php";
        // Texto Dropdown Menu 2
        $textdropdown2 = "Entrar";
        // Link Dropdown Menu 2
        $linkdropdown2 = "login.php";
        // Texto Dropdown Menu 3
        $textdropdown3 = "Sair";
        // Link Dropdown Menu 3
        $linkdropdown3 = "logout.php";
        endif;
        echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
            <div class ='container'>
            <a class='navbar-brand mb-0' href='$pagetitlelink'>
                <img class='mb-0' src='https://png.icons8.com/nolan/96/000000/musical-notes.png' alt='' width='30' height='30'>
            </a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu1'>$textomenu1<span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu2'>$textomenu2</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='$linkmenu3'>$textomenu3</a>
                    </li>
                </ul>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            $dropdownname
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <a class='dropdown-item' href='$linkdropdown1'>$textdropdown1</a>
                            <a class='dropdown-item' href='$linkdropdown2'>$textdropdown2</a>
                            <a class='dropdown-item' href='$linkdropdown3'>$textdropdown3</a>
                        </div>
                    </li>
                </ul>
                <form class='form-inline'>
                    <input class='form-control ml-4 mr-2' type='search' placeholder='Buscar'>
                    <button class='btn btn-default' type='submit'>Ok</button>
                </form>
            </div>
            </div>
        </nav>
        ";
        }
        
        function footer(){
        echo "     
            <!-- Footer -->
             <footer class='footer modal-footer '>

                 <!-- Footer Elements -->
                 <div class='container text-center'>

                   <!-- Call to action -->
                   <ul class='list-unstyled'>
                     <li>
                       <h5>Registre-se gratuitamente</h5>
                     </li>
                     <li>
                       <button class='btn btn-small btn-primary btn-dark' href='cadastrar.php'>Registrar-se!</a>
                     </li>
                   </ul>
                   <!-- Call to action -->


                 <!-- Footer Elements -->

                 <!-- Copyright -->
                 <div class='footer-copyright text-center py-3'>© 2018 Copyright:
                   <a href='#'> PuroSom.Local</a>
                 </div>
                 <!-- Copyright -->
                 </div>
               </footer>
               <!-- Footer -->
               ";
        }
        
        function bottom(){
                echo "</body>";
                footer();
        
                echo "
                <!-- Jquery JS -->	
                <script src='node_modules/jquery/dist/jquery.min.js'></script>
                <!-- Bootstrap JS -->
                <script src='node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
                <!-- Popper JS -->
                <script src='node_modules/popper.js/dist/umd/popper.js'></script>

                </html>
                ";
        }
        
        function bottomLogin(){
                echo "</body>";
                echo "
                <!-- Jquery JS -->	
                <script src='node_modules/jquery/dist/jquery.min.js'></script>
                <!-- Bootstrap JS -->
                <script src='node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
                <!-- Popper JS -->
                <script src='node_modules/popper.js/dist/umd/popper.js'></script>

                </html>
                ";
        }
        
        function bottomDashboard(){
                echo "</body>";
                footer();

                echo "
                <!-- Jquery JS -->	
                <script src='../node_modules/jquery/dist/jquery.min.js'></script>
                <!-- Bootstrap JS -->
                <script src='../node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
                <!-- Popper JS -->
                <script src='../node_modules/popper.js/dist/umd/popper.js'></script>

                </html>
                ";
        }
        
        function bottomLoginDashboard(){
                echo "</body>";
                echo "
                <!-- Jquery JS -->	
                <script src='../node_modules/jquery/dist/jquery.min.js'></script>
                <!-- Bootstrap JS -->
                <script src='../node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
                <!-- Popper JS -->
                <script src='../node_modules/popper.js/dist/umd/popper.js'></script>

                </html>
                ";    
        }
?>
