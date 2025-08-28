<?php
include_once "filmes_has_vendas.class.php";

class filmes_has_vendasDAO{
    private $conexao;

    public function __construct(){
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
        "root", "" );
        
    }
    public function inserir(filmes_has_vendas $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO filmes_has_vendas
            (idVenda, idFilme)
            VALUES
            (:idVenda, :idFilme)"
        );
        $sql->bindValue(":idVenda", $obj->getIdVenda());
        $sql->bindValue(":idFilme", $obj->getIdFilme());
    }   
    public function retornarUm($linha) {
        return "placeholder";
    }
}