<?php
    class Imagens {
        private $idImagem;
        private $nome;
        private $idFilme;

        public function getIdImagem(){
            return $this->idImagem;
        }
        public function setIdImagem($valor){
            $this->idImagem = $valor;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }

        public function getIdFilme(){
            return $this->idFilme;
        }
        public function setIdFilme($valor){
            $this->idFilme = $valor;
        }
    }