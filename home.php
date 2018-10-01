<?php
	// Titulo da Pagina
	$page_title = 'Puro Som | HOME';
?>

<!-- <html> -->
<?php
    include "includes/top.php";
    require_once "includes/navbar.php";
?>
<!-- <carrousel> -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slide-01.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slide-02.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slide-03.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Home content -->
<div class="container-fluid">
    <div class="row">
        
        <!-- left side bar -->
        <div class="col-md-2">
            Left Side Bar ---------------------------------------------------------------------------------
        </div>

        <!-- Main Content -->
        <div class="col-md-8">
            
            <!-- row do conteudo -->
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Featured Products</h2>
                    <div class="row">
                        <!-- produto -->
                        <?php
                        // includes produto
                        require_once 'functions.php';
                        
                        $sqlprodutos = sqltoarray(  
                                "SELECT produto.id,produto.nome AS nome, midia.sigla AS midia,artista.nome AS artista,album.nome AS album,genero.nome AS genero,produto.preco AS preco,produto.qtd_estoque FROM produto 
                                INNER JOIN album ON produto.cod_album = album.id
                                INNER JOIN midia ON produto.cod_midia = midia.id
                                INNER JOIN artista ON album.cod_artista = artista.id
                                INNER JOIN genero ON album.cod_genero = genero.id
                                WHERE produto.qtd_estoque > 0;");
                                foreach ($sqlprodutos as $produto) {
                                    echo("  <div class='col-md-4'>
                                                <h5>".$produto['nome']."</h5>
                                                <img src='img/products/pfthedarksideofthemoon.jpg' class='img-thumbnail' alt='Dark Side of the Moon' />
                                                <div class='mb-0 mt-1'>
                                                    <p class='price'>Valor unitário: R$".$produto['preco']."</p>
                                                </div>
                                                <div class='mb-3 mt-0'>
                                                    <button type='button' class='btn btn-sm btn-success btn-dark' data-togle='modal' data-target='#details-1'>
                                                        Mais Informações
                                                    </button>
                                                </div>
                                            </div>");
                                }
                        ?>
                        <!-- fim produto -->
                    </div>
                </div>
            </div>
        </div>
            <!-- Right Side Bar -->
            <div class="col-md-2">
                Right Side Bar ---------------------------------------------------------------------------------
            </div>
        </div>


        
    </div>
    

    
</div>
<!-- </body> -->
<?php include "includes/bottom.php";?>
<!-- </html> -->
