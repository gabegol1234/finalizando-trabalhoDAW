<?php
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";
$id = $_GET["id"];
$objDAO = new ClientesDAO();
$retorno = $objDAO->retornarUm($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="editar_ok.php" method="POST">
        nome:
        <input type="text" name="nome" value="<?=$retorno["nome"]?>" />
        <br>
        <input type="hidden" name="idCliente" value="<?=$retorno["idCliente"]?>" />
        senha:
        <input type="text" name="senha" value="<?=$retorno["senha"]?>" />
        <br>
        usuario:
        <input type="text" name="usuario"value="<?=$retorno["usuario"]?>" />
        <br>
        contato:
        <input type="number" name="contato" value="<?=$retorno["contato"]?>"/>
        <br>
        cpf:
        <input type="text" name="cpf" value="<?=$retorno["cpf"]?>"/>
        <button type="submit">enviar</button>
        <br>
</body>

</html>