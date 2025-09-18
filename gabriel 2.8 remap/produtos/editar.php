<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

// Verifica se o idFilme foi fornecido
$idFilme = isset($_GET["idFilme"]) ? $_GET["idFilme"] : 0;

$objFilmesDAO = new FilmesDAO();
$retorno = $objFilmesDAO->retornarUm($idFilme);

$objcategorias = new CategoriasDAO();
$categorias = $objcategorias->listar(); 

// Garante que todas as chaves existam para evitar warnings
$defaults = [
    "idFilme" => 0,
    "nome" => "",
    "genero" => "",
    "classificacaoEtaria" => "",
    "trilhaSonora" => "",
    "anoLancamento" => "",
    "idCategoria" => 0,
    "ofertar" => 0
];
$retorno = array_merge($defaults, $retorno ?: []);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <form action="editar_ok.php" method="POST">
        <input type="hidden" name="idFilme" value="<?= htmlspecialchars($retorno["idFilme"]) ?>" />
        
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($retorno["nome"]) ?>" />
        <br><br>

        <label>Classificação Etária:</label>
        <input type="text" name="classificacaoEtaria" value="<?= htmlspecialchars($retorno["classificacaoEtaria"]) ?>" />
        <br><br>

        <label>Trilha Sonora:</label>
        <input type="text" name="trilhaSonora" value="<?= htmlspecialchars($retorno["trilhaSonora"]) ?>" />
        <br><br>

        <label>Ano de Lançamento:</label>
        <input type="date" name="anoLancamento" value="<?= $retorno['anoLancamento'] ? date('Y-m-d', strtotime($retorno['anoLancamento'])) : '' ?>" />
        <br><br>

        <label>Gênero:</label>
        <select name="genero">
            <?php foreach($categorias as $linha): ?>
                <option value="<?= $linha["idCategoria"] ?>" <?= ($linha["idCategoria"] == $retorno["idCategoria"]) ? "selected" : "" ?>>
                    <?= htmlspecialchars($linha["nome"]) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Ofertar:</label>
        <input type="number" name="ofertar" value="<?= htmlspecialchars($retorno["ofertar"]) ?>" />
        <br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
