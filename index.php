<?php
    include_once 'lib.php';
    top('Puro Som');
    navbar();
    echo "<div class='container text-center'>";
    $dir = getcwd();
    $dir = scandir($dir);
    foreach($dir as $diretorio):
        echo "<a href='$diretorio'>'$diretorio'</a><br>";
    endforeach;  
    echo "</div>";
    bottom();
?>    
