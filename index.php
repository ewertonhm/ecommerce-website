<?php
    
    $page_title = "Puro Som";
    include "includes/top.php";
    include "includes/navbar.php";
    echo "<div class='container text-center'>";
    $dir = getcwd();
    $dir = scandir("$dir");
    foreach($dir as $diretorio):
        echo "<a href='$diretorio'>'$diretorio'</a><br>";
    endforeach;  
    echo "</div>";
    include "includes/bottom.php";
?>    
