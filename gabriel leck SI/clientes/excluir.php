<?php
    include_once "../class/clientes.class.php";
    include_once "../class/clientesDAO.class.php";
    $idCliente = $_GET["idCliente"];
    $objDAO = new ClientesDAO();
    $retorno = $objDAO->excluir($idCliente);

    if($retorno)
        header("location:listar.php?editarOk");
    else
        header("location:listar.php?editarErro");