<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/imagens.class.php";
include_once "../class/imagensDAO.class.php";
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$objfilmesDAO = new FilmesDAO();
$objimagensDAO = new ImagensDAO();
$objcategoriasDAO = new CategoriasDAO();

// Captura busca e categoria selecionada
$busca = isset($_GET['q']) ? trim($_GET['q']) : "";
$categoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;

// **Carrega categorias antes do formulário**
$listaCategorias = $objcategoriasDAO->listar();

// Filtra ou lista todos
$retorno = ($busca != "" || $categoria > 0) ? 
    $objfilmesDAO->buscarFiltrado($busca, $categoria) : 
    $objfilmesDAO->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css"/>
    <link rel="stylesheet" type="text/css" href="../geral.css"/>
</head>
<body>

<header style="background-color:#1c1c1c; padding:10px; color:white;">
    <h1>🎬 Filmoteca</h1>
</header>

<div id="estilo" style="padding:10px;">
    <?php
    if ($retorno && is_array($retorno)) {
        foreach ($retorno as $linha) {
            $retornoimagens = $objimagensDAO->retornarUm($linha["idFilme"]);
            if ($retornoimagens > 0) 
                echo "<img src='../imagens/".$retornoimagens["nome"]."' style='width:100px; display:block; margin-bottom:5px;'>";

            echo "Gênero: " . calcularGenero($linha["genero"]) . "<br>";
            echo "Nome: " . $linha["nome"] . "<br>";
            echo "Classificação Etária: " . $linha["classificacaoEtaria"] . "<br>";
            echo "Ano de Lançamento: " . $linha["anoLancamento"] . "<br>";
            echo "Trilha sonora: " . $linha["trilhaSonora"] . "<br>";
            echo (isset($linha["emOferta"]) && $linha["emOferta"] == 1) ? "Produto em oferta!<br>" : "<a href='ofertar.php?idFilme=" . $linha["idFilme"] . "'>Colocar em oferta</a><br>";
            echo "<a href='editar.php?idFilme=" . $linha["idFilme"] . "'>Editar</a> | <a href='excluir.php?idFilme=" . $linha["idFilme"] . "'>Excluir</a><br><br>";
        }
    } else {
        echo "<p>Nenhum produto encontrado.</p>";
    }

    ?>
    <br>
    <br>
</div>
<footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
    <p>Filmoteca © 2025</p>
    <nav>
        <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> | 
        <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> | 
        <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
    </nav>
</footer>

</body>
</html>
