<?php
    // iniciar sessão
   if(!isset($_SESSION)):
        session_start();
    endif;
    

    
    // variaveis navbar
        // Nome da Pagina
        $pagetitle = "Puro Som";
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
            require_once 'functions.php';
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
";?>