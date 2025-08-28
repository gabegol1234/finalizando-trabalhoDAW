<?php

include_once "imagens.class.php";

class ImagensDAO
{
    private $conexao;
    private $con;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
        $this->con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
    }

    public function listar()
    {
        $sql = $this->conexao->prepare("SELECT * FROM imagens");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(Imagens $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO imagens
            (nome, idFilme)
            VALUES
            (:nome, :idFilme)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":idFilme", $obj->getIdFilme());
        return $sql->execute();
    }

    public function excluir($idImagem)
    {
        $sql = $this->conexao->prepare("
            DELETE FROM imagens WHERE idImagem = :idImagem
        ");
        $sql->bindValue(":idImagem", $idImagem);
        return $sql->execute();
    }

    public function retornarUm($idFilme)
    {
        $sql = $this->conexao->prepare("
            SELECT * FROM imagem WHERE idFilme = :idFilme LIMIT 1
        ");
        $sql->bindValue(":idFilme", $idFilme);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(Imagens $obj)
    {
        $sql = $this->conexao->prepare("
            UPDATE imagens SET
            nome = :nome,
            idFilme = :idFilme
            WHERE idImagem = :idImagem
        ");
        $sql->bindValue(":idImagem", $obj->getIdImagem());
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":idFilme", $obj->getIdFilme());
        return $sql->execute();
    }
}