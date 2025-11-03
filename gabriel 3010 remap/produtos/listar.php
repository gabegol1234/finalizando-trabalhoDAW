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

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Painel</title>
    <link rel="stylesheet" href="../estilingue.css">
</head>

<body>
    <header class="header">
        <div>🎬 Filmoteca</div>
        <div style="margin-left:auto" class="text-muted">Administrador</div>
    </header>


    <div class="container app">
        <aside class="sidebar card">
            <nav class="nav">
                <a href="../produtos/listar.php">Produtos</a>
                <a href="../vendas/listar.php">Pedidos</a>
                <a href="../clientes/listar.php">Clientes</a>
                <a href="../categorias/listar.php">Categorias</a>
                <a href="/user/index.html">Ir para o site do usuário →</a>
            </nav>
            <hr style="margin:12px 0">
           
        </aside>


        <main class="main">
            <h2>LISTA DE VENDAS</h2>

            <!-- ATE AQUI TOPO -->



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
  <!-- RODAPE DAQUI PARA BAIXO -->

  </main>
    </div>


    <script src="/assets/js/main.js"></script>
</body>

</html>