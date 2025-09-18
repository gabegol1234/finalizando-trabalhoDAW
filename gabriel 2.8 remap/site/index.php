<link rel="stylesheet" type="text/css" href="../geral.css" />
<link rel="stylesheet" type="text/css" href="../estilo.css" />
<header>
<img src="../imgsite/logo.png" alt="Logo" style="height: 100px; width: 120;/* ajuste conforme necessário */">
</header>
 


<?php
session_start();

// --- Gerenciar carrinho ---
if(isset($_GET["carrinho"]) && isset($_GET["id"])){
    if(!isset($_SESSION["carrinho"])){
        $_SESSION["carrinho"] = [];
    }
    if(!in_array($_GET["id"], $_SESSION["carrinho"])){
        array_push($_SESSION["carrinho"], $_GET["id"]);
        echo "<h2>Adicionado ao carrinho</h2>";
    } else {
        echo "<h2>Produto já adicionado ao carrinho anteriormente</h2>";
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
    <button type="submit" style="background-color:#f39c12; color:white; border:none; padding:5px 10px;">Filtrar</button>
</form>

<!-- Lista de categorias -->
<ul>
    <?php
    foreach($categorias as $linha){
        echo "<li><a href='listar.php?idCategoria=". $linha["idCategoria"] ."'>" . htmlspecialchars($linha["nome"]) . "</a></li>";
    }
    ?>
    <li><a href="carrinho.php">Carrinho de Compras</a></li>
</ul>

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
    $retorno = array_filter($retorno, function($filme) use ($categoria) {
        return $filme['genero'] == $categoria;
    });
}

if ($retorno && is_array($retorno)) {
    foreach ($retorno as $linha) {
?>
<div>
    <h3><?= htmlspecialchars($linha["nome"]) ?></h3>
    <h4><?= htmlspecialchars($linha["preco"]) ?></h4>
    <h5><?= htmlspecialchars($linha["categorias"]) ?></h5>
    <?php
        $retornoimg = $objimagensDAO->retornarUm($linha["idFilme"]);
        if($retornoimg && isset($retornoimg["nome"])){
            echo "<img src='../imagens/".htmlspecialchars($retornoimg["nome"])."' />";
        }
    ?>
    <a href="?id=<?= urlencode($linha['idFilme']); ?>&carrinho">
        add ao carrinho
    </a>
</div>
<?php
    }
} else {
    echo "<p>Nenhum filme encontrado.</p>";
}

?>
