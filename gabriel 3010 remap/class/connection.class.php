<?php
    abstract class Connection {
        public $conexao;
        public function __construct() {
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=gabriel_ecommerce",
                "root",
                ""
            );
        }
    }