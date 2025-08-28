<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$idCategoria = $_GET["idCategoria"];
$objDAO = new categoriasDAO();
$retorno = $objDAO->retornarUm($idCategoria);
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="editar_ok.php" method="POST">
        idCategoria:
        <br>
        <!--<input type="text" name="idCategoria" value="<?php/* isset($retorno["idCategoria"]) ? $retorno["idCategoria"] : '' */?>" />-->
        <!--só pra mostrar-->
        <input disabled="disabled" type="text" value="<?=$idCategoria?>" />
        <br>
       
        nome:
        <br>
        <input type="text" name="nome" value="<?= isset($retorno["nome"]) ? $retorno["nome"] : '' ?>" />
        <br>
       
        <br>
        <!--aqui envia realmente o ID-->
        <input type="hidden" name="idCategoria" value="<?= $idCategoria ?>" />
        <input type="submit" value="Salvar" />
    </form>
</body>

</html>