<link rel="stylesheet" type="text/css" href="geral.css" />

<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/imagens.class.php";
include_once "../class/imagensDAO.class.php";

$objcategoriasDAO = new CategoriasDAO();
$categorias = $objcategoriasDAO->listar();

?>
<ul>
    <?php
    foreach($categorias as $linha){
        echo "<li><a href = 'listar.php?idCategoria=". $linha["idCategoria"] ."'>" . $linha["nome"] . "</a></li>";
    }
    ?>
</ul>
<?php
$idCategoria=$_GET["idCategoria"];
$objfilmesDAO = new FilmesDAO();
$objimagensDAO = new ImagensDAO();
$retorno = $objfilmesDAO->listar(" WHERE genero=$idCategoria");
$objimagemDAO = new ImagensDAO();

if ($retorno && is_array($retorno)) {
    foreach ($retorno as $linha) {
?>

<div>
    <h3><?=$linha["nome"]?></3>
    <h4><?=$linha["preco"]?></4>
    <h5><?=$linha["categorias"]?></h5>
    <?php
        $retornoimg = $objimagensDAO->retornarUm($linha["idFilme"]);
        if($retornoimg > 0)
        echo "<img src='../imagens/".$retornoimg["nome"]."'/>";
    }
}