<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";


$obj = new Categorias();
$obj->setIdCategoria($_POST["idCategoria"]);
$obj->setNome($_POST["nome"]);

$objDAO = new CategoriasDAO();
$retorno = $objDAO->editar($obj);
if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");