<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$obj = new Categorias();
$obj->setNome($_POST["nome"]);

$objDAO = new categoriasDAO();
$retorno = $objDAO->inserir($obj);
if($retorno)
    header("location:listar.php?inserido=1"); // Sucesso
else
    header("location:listar.php?inserido=2"); // Erro