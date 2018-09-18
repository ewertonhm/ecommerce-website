<?php
$dir = getcwd();
$dir = scandir("$dir");
foreach($dir as $diretorio):
    echo "<a href='$diretorio'>'$diretorio'</a><br>";
endforeach;    

