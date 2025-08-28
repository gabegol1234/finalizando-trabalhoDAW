<?php
class Vendas
{
    private $idVenda;
    private $idCliente;
    private $dataVenda;
    private $statusVenda;
    private $pagamento;
    private $entrega;

    public function getIdVenda()
    {
        return $this->idVenda;
    }
    public function setIdVenda($valor)
    {
        $this->idVenda = $valor;
    }
    public function getIdCliente() {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
    public function getDataVenda()
    {
        return $this->dataVenda;
    }
    public function setDataVenda($valor)
    {
        $this->dataVenda = $valor;
    }
    public function getStatusVenda()
    {
        return $this->statusVenda;
    }
    public function setStatusVenda($valor)
    {
        $this->statusVenda = $valor;
    }
    public function getPagamento()
    {
        return $this->pagamento;
    }
    public function setPagamento($valor)
    {
        $this->pagamento = $valor;
    }
    public function getEntrega()
    {
        return $this->entrega;
    }
    public function setEntrega($valor)
    {
        $this->entrega = $valor;
    }
}