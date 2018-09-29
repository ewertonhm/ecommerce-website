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
		$this->setId
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

class Faixas{
	public $posicao;
	public $titulo;
	public $tempoTotal;

	//fazer get e set
}

?>