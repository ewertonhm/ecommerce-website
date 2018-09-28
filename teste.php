<?php
require_once 'classes/email.php';

$mail = new email();

$mail->setAssunto('teste de email php');
$mail->setDestinatario('ewertonhm@outlook.com');
$mail->setMensagem('teste teste teste');
$mail->enviar();