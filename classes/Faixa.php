<?php

require_once 'Artista.php';
require_once 'Album.php';
require_once 'Genero.php';
require_once 'DB.php';

class Faixa {
	public $_nomeFaixa, $_duracaoFaixa, $_posicaoFaixa, $_generoFaixa, $_artistaFaixa, $_albumFaixa;
        private $_dbFaixa, $_tabelaFaixa, $_idFaixa;
        
        function Genero($id){
            $this->_generoFaixa = new Genero($id);
            $this->_generoFaixa->ler_genero();
        }
        
        function Artista($id){
            $this->_artistaFaixa = new Artista($id);
            $this->_artistaFaixa->ler_artista();
        }
        
        function Album($id){
            $this->_albumFaixa = new Album($id);
            $this->_albumFaixa->ler_album();
        }
        
        function __construct($id = '',$nome = '',$duracao = '',$posicao = '',$genero,$artista,$album) {
            $this->set_idFaixa($id);
            $this->set_NomeFaixa($nome);
            $this->set_DuracaoFaixa($duracao);
            $this->set_PosicaoFaixa($posicao);
            $this->set_TabelaFaixa('faixa');
            $this->_dbFaixa = DB::get_instance();
            
            if($genero != NULL){
                Genero($genero);
            }
            
            if($artista != NULL){
                Artista($artista);
            }
            
            if($album != NULL){
                Album($album);
            }
        }
                

        
        function criar_faixa(){
            $faixa = [
                'nome'=>$this->get_nomeFaixa(),
                'posicao'=> $this->get_posicaoFaixa(),
                'duracao'=>$this->get_duracaoFaixa(),
                'cod_artista'=>$this->_artistaFaixa->get_idArtista(),
                'cod_album'=>$this->_albumFaixa->get_idAlbum(),
                'cod_genero'=>$this->_generoFaixa->get_idGenero()
                ];
            $this->_dbFaixa->insert($this->get_tabelaFaixa(),$faixa);
            $this->set_idFaixa($this->_dbFaixa->get_lastInsertID());
        }
        
        function editar_faixa(){
            $faixa = [
                'nome'=>$this->get_nomeFaixa(),
                'posicao'=> $this->get_posicaoFaixa(),
                'duracao'=>$this->get_duracaoFaixa(),
                'cod_artista'=>$this->_artistaFaixa->get_idArtista(),
                'cod_album'=>$this->_albumFaixa->get_idAlbum(),
                'cod_genero'=>$this->_generoFaixa->get_idGenero()
                ];
            $this->_dbFaixa->update($this->get_tabelaFaixa(),$this->get_idFaixa(),$faixa);
        }
        
        function excluir_faixa(){
            $this->_dbFaixa->delete($this->get_tabelaFaixa(),$this->get_idFaixa());
        }
        
        // Getter e Setters
        function get_nomeFaixa() {
            return $this->_nomeFaixa;
        }

        function get_duracaoFaixa() {
            return $this->_duracaoFaixa;
        }

        function get_posicaoFaixa() {
            return $this->_posicaoFaixa;
        }

        function set_nomeFaixa($_nomeFaixa) {
            $this->_nomeFaixa = $_nomeFaixa;
        }

        function set_duracaoFaixa($_duracaoFaixa) {
            $this->_duracaoFaixa = $_duracaoFaixa;
        }

        function set_posicaoFaixa($_posicaoFaixa) {
            $this->_posicaoFaixa = $_posicaoFaixa;
        }
        
        function get_tabelaFaixa() {
            return $this->_tabelaFaixa;
        }

        private function set_tabelaFaixa($_tabelaFaixa) {
            $this->_tabelaFaixa = $_tabelaFaixa;
        }
        
        function get_idFaixa() {
            return $this->_idFaixa;
        }

        private function set_idFaixa($_idFaixa) {
            $this->_idFaixa = $_idFaixa;
        }

}
?>