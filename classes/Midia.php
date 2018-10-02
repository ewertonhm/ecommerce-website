<?php
class Midia{
	public $tipoMidia;
	public $id;
	public $qtd;
	public $preco;

	public function getMidia(){
		return $this->tipoMidia;
	}

	public function setMidia($tipoMidia){
		$this->tipoMidia = $tipoMidia;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getQtd(){
		return $this->qtd;
	}

	public function setQtd($qtd){
		$this->qtd = $qtd;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}
}

