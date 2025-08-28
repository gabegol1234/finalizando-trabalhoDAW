<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$obj = new Categorias();
$obj->setNome($_POST["nome"]);

$objDAO = new categoriasDAO();
$retorno = $objDAO->inserir($obj);
if($retorno)
    echo "adicionado com sucesso";
else
    echo "Erro!por favor,consulte um adm";