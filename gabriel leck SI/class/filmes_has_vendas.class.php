<?php
class filmes_has_vendas {
    private $idFilmes_has_vendas;
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
    public function setIdFilmes_has_vendas($idFilmes_has_vendas) {
        $this->idFilmes_has_vendas = $idFilmes_has_vendas;
    }
    public function getIdFilmes_has_vendas() {
        return $this->idFilmes_has_vendas;
    }
}