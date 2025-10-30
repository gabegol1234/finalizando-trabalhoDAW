<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <link rel="stylesheet" href="../estilo.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<?php

    require_once "../sobreEmpresa/header.php";

    // --- Listagem de filmes filtrados ---
    $objfilmesDAO = new FilmesDAO();
    $objimagensDAO = new ImagensDAO();

    // Busca pelo termo, se houver
    if ($busca !== '') {
        $retorno = $objfilmesDAO->buscarFiltrado($busca);
    } else {
        $retorno = $objfilmesDAO->listar("ORDER BY idFilme DESC LIMIT 20");
    }

    // Se filtrou por categoria, aplicamos filtro extra em PHP
    if ($categoria != 0 && $retorno && is_array($retorno)) {
        $retorno = array_filter($retorno, function ($filme) use ($categoria) {
            return $filme['genero'] == $categoria;
        });
    }
    ?>
    <div class="grid">
        <?php
        if ($retorno && is_array($retorno)) {
            foreach ($retorno as $linha) {
                ?>
                <div class="divconteudo">
                    <h3 class="nome">Nome: <?= htmlspecialchars($linha["nome"]) ?></h3>
                    <h4>Preço: <?= htmlspecialchars($linha["preco"]) ?></h4>
                    <h5>Categoria:<?= htmlspecialchars($linha["categorias"]) ?></h5>
                    <?php
                    $retornoimg = $objimagensDAO->retornarUm($linha["idFilme"]);
                    if ($retornoimg && isset($retornoimg["nome"])) {
                        echo "<img src='../imagens/" . htmlspecialchars($retornoimg["nome"]) . "' />";
                    }
                    ?>
                    <br>
                    <a href="?id=<?= urlencode($linha['idFilme']); ?>&carrinho">
                        Adicionar ao Carrinho
                    </a>
                </div>
                <?php
            }
        } else {
            echo "<p>Nenhum filme encontrado.</p>";
        }
        ?>


    </div>
<?php
    require_once "../sobreEmpresa/footer.php";
?>
</body>
</html>