<?php

require_once "connection.class.php";
include_once "categorias.class.php";

class categoriasDAO extends Connection
{
    public function listar()
    {
        $sql = $this->conexao->prepare(
            "SELECT * FROM categorias"
        );
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(Categorias $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO categorias(nome) VALUES (:nome)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        return $sql->execute();
    }

    public function excluir($idCategoria)
    {
        $sql = $this->conexao->prepare("
            DELETE FROM filmes
            WHERE genero = :idCategoria
        ");
        $sql->bindValue(":idCategoria", $idCategoria);
        $sql->execute();

        $sql = $this->conexao->prepare("
            DELETE FROM categorias WHERE idCategoria = :idCategoria
        ");
        $sql->bindValue(":idCategoria",  $idCategoria);
        return $sql->execute();
    }

    public function retornarUm($idCategoria)
    {
        $sql = $this->conexao->prepare("
            SELECT * FROM categorias WHERE idCategoria = :idCategoria
        ");
        $sql->bindValue(":idCategoria", $idCategoria);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(Categorias $obj)
    {
        $sql = $this->conexao->prepare("
            UPDATE categorias SET
            nome = :nome
            WHERE idCategoria = :idCategoria
        ");
        $sql->bindValue(":idCategoria", $obj->getIdCategoria());
        $sql->bindValue(":nome", $obj->getNome());
        return $sql->execute();
    }
}