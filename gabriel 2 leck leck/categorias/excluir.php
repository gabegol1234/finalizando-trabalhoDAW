<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
$idCategoria = $_GET["idCategoria"];
$objDAO = new categoriasDAO();
$retorno = $objDAO->excluir($idCategoria);

if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");