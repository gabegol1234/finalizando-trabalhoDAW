<?php

require_once "connection.class.php";
include_once "vendas.class.php";

class VendasDAO extends Connection
{
    public function listar($idVenda = null) {
        if(!$idVenda) {
            $sql = $this->conexao->prepare("SELECT * FROM vendas");
            $sql->execute();
            return $this->conexao->lastInsertId();
        } else {
            $sql = $this->conexao->prepare("SELECT * FROM vendas WHERE idVenda = :idVenda");
            $sql->bindValue(":idVenda", $idVenda);
            $sql->execute();
            return $sql->fetch();
        }
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
    public function listarVendas()
    {
        $sql = $this->conexao->prepare(
            "SELECT * FROM vendas"
        );
        $sql->execute();
        return $sql->fetchAll();
    }
}