<?php

require_once 'DB.php';
$db = DB::get_instance();

    $params = [
        'joins' => ['album','midia'],
        'bindjoin' => ['produto.cod_album = album.id','produto.cod_midia = midia.id'],
        'conditions' => ['lname = ?','fname = ?'],
        'bind' => ['lharu','fharu'],
        'order' => "fname Desc",
        'limit' => 5
    ];
    var_dump($params);
    echo count($params['joins']);
        $contacts = $db->findFirst('contacts',$params);
    var_dump($contacts);
    