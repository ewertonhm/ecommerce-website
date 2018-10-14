<?php
    include_once "classes/_classes.php";
    require_once "lib.php";
    
    top('Puro Som');
    navbar();
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
                       
                        $db = DB::get_instance();
                        
                        $params = [
                            'joins'=>['album','midia','artista','genero'],
                            'bindjoin'=>['produto.cod_album = album.id','produto.cod_midia = midia.id','album.cod_artista = artista.id','album.cod_genero = genero.id'],
                            'conditions'=>['produto.qtd_estoque > ?'],
                            'bind'=>[0]
                        ];
                        $produtos = $db->find('produto',$params);
                                foreach ($produtos as $sql) {
                                    $produto = new Produto();
                                    $produto->setIdProduto($sql['id']);
                                    $produto->setNomeProduto($sql['nome']);
                                    $produto->setPrecoProduto($sql['preco']);
                                    echo("  <div class='col-md-4'>
                                                <h5>".$produto->getNomeProduto()."</h5>
                                                <img src='img/products/pfthedarksideofthemoon.jpg' class='img-thumbnail' alt='Dark Side of the Moon' />
                                                <div class='mb-0 mt-1'>
                                                    <p class='price'>Valor unitário: R$".$produto->getPrecoProduto()."</p>
                                                </div>
                                                <div class='mb-3 mt-0'>
                                                    <button type='button' class='btn btn-sm btn-success btn-dark' data-togle='modal' data-target='#details-1' id='".$produto->getIdProduto()."'>
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
<?php include bottom();?>
<!-- </html> -->
