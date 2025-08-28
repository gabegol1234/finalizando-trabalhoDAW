<?php
//echo"<pre>";
//print_r($_POST);
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";

$obj = new Clientes();
$obj->setNome($_POST["nome"]);
$obj->setUsuario($_POST["usuario"]);
$obj->setSenha($_POST["senha"]);
$obj->setContato($_POST["contato"]);
$obj->setCpf($_POST["cpf"]);
$objDAO = new ClientesDAO();
$retorno = $objDAO->inserir($obj);

switch ($retorno) {
    case 1:
        echo "adicionado com sucesso";
        break;
    case 2:
        echo "Erro: CPF já cadastrado";
        break;
    case 3:
        echo "Erro: Username já cadastrado";
        break;
    default:
        echo "Erro: ...?";
}