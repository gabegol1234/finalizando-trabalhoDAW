<?php
class filmes_has_vendas {
    private $idFilme;
    private $idVenda;

    public function setIdFilme($valor)
    {
        $this->idFilme = $valor;
    }
    public function getIdFilme()
    {
        return $this->idFilme;
    }
    public function setIdVenda($valor)
    {
        $this->idVenda = $valor;
    }
    public function getIdVenda()
    {
        return $this->idVenda;
    }
}