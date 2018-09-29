<?php

class Pessoa{
	public $nome;
	public $cpf;
	public $email;
	public $endereco;
	public $cidade;
	public $uf;

	public function getNome() {
   		return $this->nome;
  }
  
  	public function setNome($nome) {
    	$this->nome= $nome;
  }

  public function getCpf(){
  		return $this->cpf;
  }

  public function setCpf($cpf){
  		$this->cpf = $cpf;
  }

  public function getEmail(){
  		return $this->email;
  }

  public function setEmail($email){
  		$this->email = $email;
  }

  public function getEndereco(){
  		return $this->endereco;
  }

  public function setEndereco($endereco){
  		$this->endereco = $endereco;
  }

  public function getCidade(){
  		return $this->cidade;
  }

  public function setCidade($cidade){
  		$this->cidade = $cidade;
  }

  public function getUf(){
  		return $this->uf;
  }

  public function setUf($uf){
  		$this->uf = $uf;
  }
}
  
?>