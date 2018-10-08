<?php
    // iniciar sessão
    if(!isset($_SESSION)):
        session_start();
    endif;
    
    // Include
    include_once '../lib.php';
    require_once '../classes/_classes.php';

    // Verificar se o botão ja foi clicado
    if(isset($_POST['btn-cadastrar'])):
	//array para salvar as mensagens de erro
	$erros = array();
        
        $artista = new Artista(0,$_POST['nome']);
        // verifica se as variaveis (campos) estão vazias
        if(empty($artista->get_nomeArtista())):  
            $erros[] = "<li> Nome e Sigla precisam ser preenchidos. </li>";
        else:
            $artista->criar_artista();
            $erros[] = "<li> Cadastro realizado com sucesso.</li>";                
        endif; 
    endif;    
    
    topDashboard('Cadastro de Artistas');
    navbarDashboard();	
?>
<!-- <body> -->
<div class="container">
    <table style="width:100%">
        <form class="form-control-plaintext" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table class="table table-borderless">
		<thead>
                    <tr>
			<div class="text-center">
                            <h1> Cadastro de Artistas </h1>
			</div>
                    </tr>
		</thead>
		<tbody>
                    <tr>
			<td></td>
			<td>Nome: <input class="form-text" type="text" name="nome"></td>
			<td></td>
                    </tr>
		</tbody>			
            </table>
            <div class="text-center">
                <br><br>
                <?php
                    // se existir erros, exibe
                    if(!empty($erros)):
                        foreach ($erros as $erro):
                            echo $erro."<br>";            
                        endforeach;
                    endif;	
                ?>
                <button class="btn btn-lg btn-primary" type="submit" name="btn-cadastrar">Cadastrar</button>
            </div>
	</form>
    </table>    
</div>
<!-- </body> -->
<?php bottomDashboard();?>
<!-- </html> -->
