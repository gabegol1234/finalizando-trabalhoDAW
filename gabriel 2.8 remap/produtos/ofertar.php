<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$idFilme = $_GET["idFilme"];
$objDAO = new FilmesDAO();
$retorno = $objDAO->retornarUm($idFilme);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Oferta</title>
</head>

<body>
    <h1>Editar Produto em Oferta</h1>
    
    <form action="ofertar_ok.php" method="POST">
        <input type="hidden" name="idFilme" value="<?= $retorno["idFilme"] ?? '' ?>" />

        oferta:
        <input type="number" name="ofertar" value="<?= $retorno["ofertar"] ?? '' ?>" />
        <br>

        <button type="submit">Salvar Oferta</button>
    </form>
</body>

</html>
