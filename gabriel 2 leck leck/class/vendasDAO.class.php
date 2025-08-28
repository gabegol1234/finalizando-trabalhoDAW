<?php

include_once "vendas.class.php";

class VendasDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost;dbname=gabriel_ecommerce",
            "root",
            ""
        );
    }

    public function listar()
    {
        $sql = $this->conexao->prepare("SELECT * FROM vendas");
        $sql->execute();
        return $this->conexao->lastInsertId();
    }

    public function inserir(Vendas $obj)
    {
        $sql = $this->conexao->prepare("
            INSERT INTO vendas (idCliente, statusVenda, pagamento, dataVenda, entrega)
            VALUES (:idCliente, :statusVenda, :pagamento, :dataVenda, :entrega)
        ");
        $sql->bindValue(":idCliente", $obj->getIdCliente());
        $sql->bindValue(":statusVenda", $obj->getStatusVenda());
        $sql->bindValue(":pagamento", $obj->getPagamento());
        $sql->bindValue(":dataVenda", $obj->getDataVenda());
        $sql->bindValue(":entrega", $obj->getEntrega());
        $sql->execute();

        return $this->conexao->lastInsertId();
    }
}