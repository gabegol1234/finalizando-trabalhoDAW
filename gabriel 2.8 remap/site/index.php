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
        <h1>🎬 Filmoteca</h1>
        <ul class="menu-categorias">
            <?php
            foreach ($categorias as $linha) {
                echo "<li><a href='listar.php?idCategoria=" . $linha["idCategoria"] . "'>" . $linha["nome"] . "</a></li>";
            }
            ?>
        </ul>
        <!-- Formulário de busca -->
        <form method="GET" action="" style="display:flex; gap:5px; margin-top:5px;">
            <input type="text" name="q" placeholder="Buscar produto..." value="<?= htmlspecialchars($busca) ?>">
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

        <!-- Lista de categorias -->
        <ul>
         
            <li><a href="carrinho.php">Carrinho de Compras</a></li>
        </ul>
    </header>

    <style>
        /* Remove os marcadores e padding padrão */
        .menu-categorias {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            /* faz os itens ficarem na horizontal */
            gap: 20px;
            /* espaço entre os itens */
        }

        /* Estiliza os links */
        .menu-categorias li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            transition: background 0.3s, color 0.3s;
        }

        /* Efeito ao passar o mouse */
        .menu-categorias li a:hover {
            background-color: white;
            color: #1c1c1c;
            border-radius: 5px;
        }
    </style>









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
                    <h3 class="nome"><?= htmlspecialchars($linha["nome"]) ?></h3>
                    <h4><?= htmlspecialchars($linha["preco"]) ?></h4>
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