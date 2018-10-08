<?php
require_once 'classes/artista.php';
$artista = new artista('teste1',1);

$artista->ler_artista();

echo $artista->get_nomeArtista();