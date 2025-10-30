<header>
    <?php
    
    // Iniciar sessão
    session_start();

    // Adicionar ao carrinho
    if (isset($_GET["carrinho"]) && isset($_GET["id"])) {
        if (!isset($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = [];
        }
        if (!in_array($_GET["id"], $_SESSION["carrinho"])) {
            array_push($_SESSION["carrinho"], $_GET["id"]);
            echo "<div id='bandeirola'>Adicionado ao carrinho</div>";
        } else {
            echo "<div id='bandeirola'>Item já adicionado ao carrinho</div>";
        }
    }

    // Incluir as classes
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
    $listaCategorias = $categorias;?>
    
    <div id="containerHeader">
        <div>🎬 Filmoteca</div>
        <div>
            <form method="GET" action="../site/">
                <input id='barraPesquisa' type="text" name="q" placeholder="Buscar produto..." value="<?= htmlspecialchars($busca) ?>">
                <button type="submit">Filtrar</button>
            </form>
        </div>
        <div>
            <button><a href="carrinho.php">Carrinho de Compras</a></button>
                
        </div>
        <div>
            <?php
                foreach ($categorias as $linha) {
                    echo "<button><a href='../site/?categoria=" . $linha["idCategoria"] . "'>" . $linha["nome"] . "</a></button>";
                }
            ?>
        </div>
    </div>

</header>