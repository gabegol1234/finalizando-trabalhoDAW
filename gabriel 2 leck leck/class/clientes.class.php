<?php
    class Clientes {
        private $idCliente;
        private $nome;
        private $usuario;
        private $senha;
        private $contato;
        private $cpf;

        public function getIdCliente(){
            return $this->idCliente;
        }
        public function setIdCliente($valor){
            $this->idCliente = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($valor){
            $this->cpf = $valor;
        }
        public function getContato(){
            return $this->contato;
        }
        public function setContato($valor){
            $this->contato = $valor;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($valor){
            $this->senha = $valor;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($valor){
            $this->usuario = $valor;
        }
    }