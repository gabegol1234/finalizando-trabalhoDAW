<!DOCTYPE HTML>
<html lang="pt">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <title>Inserir categorias</title>
    <meta charset="UTF-8"/>
</head>
<body>
<?php
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";

$objcategoriasDAO = new categoriasDAO();
$retorno = $objcategoriasDAO->listar();

if(isset($_GET["inserido"])) {
    if($_GET["inserido"] == 1) {
        echo "<h2>Inserido com sucesso!</h2>";
    } else if($_GET["inserido"] == 2) {
        echo "<h2>Erro ao inserir!</h2>";
    }
}
if(isset($_GET["editado"])) {
    if($_GET["editado"] == 1) {
        echo "<h2>Editado com sucesso!</h2>";
    } else if($_GET["editado"] == 2) {
        echo "<h2>Erro ao editar!</h2>";
    }
}

  if(isset($_GET["excluido"])) {
    if($_GET["excluido"] == 1) {
        echo "<h2>Excluido com sucesso!</h2>";
    } else if($_GET["excluido"] == 2) {
        echo "<h2>Erro ao excluido!</h2>";
    }
}
  



if(isset($_GET["excluirOk"]))
    echo "<h2>Excluído com sucesso!</h2>";
if(isset($_GET["excluirErro"]))
    echo "<h2>Erro ao excluir!</h2>";

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
?>
</body>
</html>