<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$idFilme = isset($_GET["idFilme"]) ? $_GET["idFilme"] : null;
$objDAO = new filmesDAO();
$retorno = $objDAO->excluir($idFilme);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");