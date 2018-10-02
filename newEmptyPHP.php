<?php

require_once 'classes/DB.php';

$db = DB::get_instance();

$contact = ['Ewerton','Marschalk','Ewerton@hotmail.com','44444444444','5555555555555'];

//$db->query("",[]);
$db->query("INSERT INTO contacts (`fname`,`lname`,`email`,`cell_phone`,`home_phone`) values (?,?,?,?,?)",$contact);

echo $db->get_error();
echo $db->get_count();