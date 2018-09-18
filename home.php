<?php
	// Titulo da Pagina
	$page_title = 'Puro Som | HOME';
?>

<!-- <html> -->
<?php
    include "includes/top.php";
    include "includes/navbar.php";
?>
<!-- <body> -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="img-fluid d-block" src="img/slide-01.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide" >
            </div>
            <div class="carousel-item">
                <img class="img-fluid d-block" src="img/slide-02.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid d-block" src="img/slide-03.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>    
    </div>
<!-- </body> -->
<?php include "includes/bottom.php";?>
<!-- </html> -->
