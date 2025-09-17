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

        $sql->execute();
    }   

    public function retornarIdFilme($idVenda) {
        $sql = $this->conexao->prepare("
            SELECT idFilme
            FROM filmes_has_vendas
            WHERE idVenda = :idVenda
        ");
        $sql->bindValue(":idVenda", $idVenda);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function retornarIdVenda($idFilme) {

    }
}