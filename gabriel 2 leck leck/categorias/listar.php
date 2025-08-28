<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$objcategoriasDAO = new categoriasDAO();
$retorno = $objcategoriasDAO->listar();

if(isset($_POST["editarOK"]))
echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
echo "<h2>Erro ao editar!</h2>";

echo "<a href='inserir.php'>inserir</a><br>";
foreach($retorno as $linha){
    echo "idCategoria: ".$linha["idCategoria"];
    echo "<br/>nome:" .$linha["nome"];
    echo "<br/>
        <a href='editar.php?idCategoria=".$linha["idCategoria"]."'>
        editar</a>
        <a href='excluir.php?idCategoria=".$linha["idCategoria"]."'>
        excluir</a>

        <br  /><br  />";
    }