<?php
    class Categorias {
        private $idCategoria;
        private $nome;

        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function setIdCategoria($valor){
            $this->idCategoria = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
    }