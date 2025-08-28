<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";


$obj = new Clientes();
$obj->setUsuario($_POST["usuario"]);
$obj->setSenha($_POST["senha"]);

$objDAO = new ClientesDAO();
$retorno = $objDAO->login($obj);

if($retorno == 2)
    echo "email nao cadastrado";
else if($retorno == 1)
    echo "senha incorreta";
else{
    session_start();
    $_SESSION["idCliente"] = $retorno["idCliente"];
    $_SESSION["login"] = true;
    header("location:index.php?loginok");
}

