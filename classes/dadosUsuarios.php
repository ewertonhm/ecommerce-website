<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dadosUsuarios
 *
 * @author Ewerton
 */
class dadosUsuarios {
    private $id;
    private $cpf;
    private $nome;
    private $datadenasc;
    private $telefone;
    private $celular;
    private $endereco;
    private $cidade;
    private $estado;
    private $cod_usuario;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDatadenasc() {
        return $this->datadenasc;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCod_usuario() {
        return $this->cod_usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDatadenasc($datadenasc) {
        $this->datadenasc = $datadenasc;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }


    
           
}
