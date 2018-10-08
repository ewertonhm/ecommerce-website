<?php
require_once 'classes/DB.php';

$db = DB::get_instance();

function sanitize($dirty){
    return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

$resp = ['success'=>false];

if($_POST){
    $required = ['id','field'];
    foreach($required as $field){
        if(!isset($_POST[$field])){
            echo json_encode($resp);
            die();
        }
        
        //$table = 'usuarios';
        $id = sanitize($_POST['id']);
        $field = sanitize($_POST['field']);
        if(sanitize($_POST['field']) == 'senha'){
            $value = md5(sanitize($_POST['value']));
        } else $value = sanitize($_POST['value']);

        
        if($db->update($table,$id,[$field=>$value])){
            $resp['success'] = true;
        }
    }
}
echo json_encode($resp);
die();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

