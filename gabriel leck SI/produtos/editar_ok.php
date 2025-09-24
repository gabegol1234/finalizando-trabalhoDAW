<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

if (!isset($_POST["idFilme"])) {
    die("Erro: idFilme não enviado no formulário.");
}

$obj = new Filmes();
$obj->setIdFilme($_POST["idFilme"]);
$obj->setNome($_POST["nome"]);
$obj->setGenero($_POST["genero"]);
$obj->setClassificacaoEtaria($_POST["classificacaoEtaria"]);
$obj->setAnoLancamento($_POST["anoLancamento"]);
$obj->setTrilhaSonora($_POST["trilhaSonora"]);
$obj->setOfertar($_POST["ofertar"]);

$objDAO = new FilmesDAO();
$retorno = $objDAO->editar($obj);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");