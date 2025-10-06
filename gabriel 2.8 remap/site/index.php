<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css" />
</head>

<body>

    <?php
    session_start();

    // --- Gerenciar carrinho ---
    if (isset($_GET["carrinho"]) && isset($_GET["id"])) {
        if (!isset($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = [];
        }
        if (!in_array($_GET["id"], $_SESSION["carrinho"])) {
            array_push($_SESSION["carrinho"], $_GET["id"]);
            echo "<h2 class='exemplo'>Adicionado ao carrinho</h2>";
        } else {
            echo "<h2 class='exemplo'>Produto já adicionado ao carrinho anteriormente</h2>";
        }
    }

    require_once "../class/categorias.class.php";
    require_once "../class/categoriasDAO.class.php";
    require_once "../class/filmes.class.php";
    require_once "../class/filmesDAO.class.php";
    require_once "../class/imagens.class.php";
    require_once "../class/imagensDAO.class.php";

    $objcategoriasDAO = new CategoriasDAO();
    $categorias = $objcategoriasDAO->listar();

    $busca = isset($_GET['q']) ? $_GET['q'] : '';
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 0;
    $listaCategorias = $categorias;

    ?>

    <header style="background-color:#1c1c1c; padding:10px; color:white;">
    <div class="container">    
    <div class="container1">
    <h1>🎬 Filmoteca</h1>
    </div>
    <div style="margin: 6px;">
        <!-- Formulário de busca -->
        <form method="GET" action="" style="display:flex; gap:5px; margin-top:5px; text-align: center;">
            <input type="text" name="q" placeholder="Buscar produto..." value="<?= htmlspecialchars($busca) ?>" style="width:700px">
            <select name="categoria">
                <option value="0">Todas as categorias</option>
                <?php
                if ($listaCategorias && is_array($listaCategorias)) {
                    foreach ($listaCategorias as $cat) {
                        $sel = ($categoria == $cat["idCategoria"]) ? "selected" : "";
                        echo "<option value='{$cat["idCategoria"]}' $sel>" . htmlspecialchars($cat["nome"]) . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit"
                style="background-color:#f39c12; color:white; border:none; padding:5px 10px;">Filtrar</button>
        </form>
        </div>
    <div class="divmenu-categorias">
        <ul class="menu-categorias">
            <?php
            foreach ($categorias as $linha) {
                echo "<li><a href='listar.php?idCategoria=" . $linha["idCategoria"] . "'>" . $linha["nome"] . "</a></li>";
            }
            ?>
            <li><a href="carrinho.php">Carrinho de Compras</a></li>
            
        </ul>
    </div>
    </div>

    </header>










    <?php
    // --- Listagem de filmes filtrados ---
    $objfilmesDAO = new FilmesDAO();
    $objimagensDAO = new ImagensDAO();

    // Busca pelo termo, se houver
    if ($busca !== '') {
        $retorno = $objfilmesDAO->buscarFiltrado($busca);
    } else {
        $retorno = $objfilmesDAO->listar(" ORDER BY idFilme DESC LIMIT 20");
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
                    <h5><?= htmlspecialchars($linha["categorias"]) ?></h5>
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

</body>
</div>
<br>
<br>
<br>
<br>
<br>
<footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
    <p>Filmoteca © 2025</p>
    <nav>
        <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> |
        <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> |
        <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
    </nav>
</footer>

</html>