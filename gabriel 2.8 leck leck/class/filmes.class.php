<?php
    class Filmes {
        private $idFilme;
        private $nome;
        private $preco;
        private $genero;
        private $classificacaoEtaria;
        private $anoLancamento;
        private $descricao;
        private $duracao;
        private $trilhaSonora;
        private $ofertar;

        public function getIdFilme(){
            return $this->idFilme;
        }
        public function setIdFilme($valor){
            $this->idFilme = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($valor){
            $this->preco = $valor;
        }
        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($valor){
            $this->genero = $valor;
        }
        public function getClassificacaoEtaria(){
            return $this->classificacaoEtaria;
        }
        public function setClassificacaoEtaria($valor){
            $this->classificacaoEtaria = $valor;
        }
        public function getAnoLancamento(){
            return $this->anoLancamento;
        }
        public function setAnoLancamento($valor){
            $this->anoLancamento= $valor;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($valor){
            $this->descricao = $valor;
        }
        public function getDuracao(){
            return $this->duracao;
        }
        public function setDuracao($valor){
            $this->duracao = $valor;
        }
        public function getTrilhaSonora(){
            return $this->trilhaSonora;
        }
        public function setTrilhaSonora($valor){
            $this->trilhaSonora = $valor;
        }
        public function getOfertar(){
            return $this->ofertar;
        }
        public function setOfertar($valor){
            $this->ofertar = $valor;
        }
    }