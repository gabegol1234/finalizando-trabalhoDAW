<?php
session_start();
if(!isset($_SESSION["login"]))
    header("location:../site/login.php");
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";

$objclientesDAO = new ClientesDAO();
$retorno = $objclientesDAO->listar();
/*
echo "<pre>";
print_r($retorno);
*/
if(isset($_POST["editarOK"]))
echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
echo "<h2>Erro ao editar!</h2>";

echo "<a href='inserir.php'>inserir</a><br>";
foreach($retorno as $linha){
    echo "nome: ".$linha["nome"];
    echo "<br/>contato:" .$linha["contato"];
    echo "<br/>";
    echo "cpf: ".$linha["cpf"];
    echo "<br/>usuario:" .$linha["usuario"];
    echo "<br/>senha:" .$linha["senha"];
    echo "<br/>
        <a href='editar.php?idCliente=".$linha["idCliente"]."'>
        editar</a>
        <a href='excluir.php?idCliente=".$linha["idCliente"]."'>
        excluir</a>

        <br/><br/>";
    }     