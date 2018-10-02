<?php

if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
    echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';

    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
}  

$file=file_get_contents($arquivo_tmp);

var_dump($file);

$query = ("INSERT INTO 'album' (capa) VALUES $file WHERE id=$id");

?>
<html>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   Selecione uma imagem: <input name="arquivo" type="file" />
   <br>
   <input type="submit" value="Salvar" />
</form>

</html>