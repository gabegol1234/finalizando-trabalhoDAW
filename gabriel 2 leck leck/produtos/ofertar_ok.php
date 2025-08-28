<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$obj = new Filmes();
$obj->setIdFilme($_POST["idFilme"]);
$obj->setOfertar($_POST["ofertar"]);

$objDAO = new FilmesDAO();

$retorno = $objDAO->ofertar($obj);

if ($retorno)
    header("Location: listar.php?ofertaEditada=ok");
else
    header("Location: listar.php?erroOferta=1");