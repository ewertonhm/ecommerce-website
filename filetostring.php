<?php
$file=file_get_contents('img/slide-01.jpg');

var_dump($file);


file_put_contents('test.jpg',$file);
?>