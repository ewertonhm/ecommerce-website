<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 *
 * @author Ewerton
 */
class Email {
    public $remetente;
    public $destinatario;
    public $assunto;
    public $mensagem;
    public $header;
    
    // getters
    function getRemetente() {
        return $this->remetente;
    }

    function getDestinatario() {
        return $this->destinatario;
    }

    function getAssunto() {
        return $this->assunto;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getHeader() {
        return $this->header;
    }
    
    // setters
    function setRemetente($remetente) {
        $this->remetente = $remetente;
    }

    function setDestinatario($destinatario) {
        $this->destinatario = $destinatario;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setHeader($header) {
        $this->header = $header;
    }
    
    // construtor
    public function __construct() {
        $this->setRemetente('compras@purosom.com.br');
        $this->setHeader("De: ".$this->getRemetente());
    }
    
    public function enviar(){
        mail($this->getDestinatario(), $this->getAssunto(), $this->getMensagem(), $this->getHeader());
    }
    
}
