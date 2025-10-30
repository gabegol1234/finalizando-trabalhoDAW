<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css" />
</head>
<body>
    <?php
        require_once "../sobreEmpresa/header.php";
    ?>
</body>
</html>
<?php
if(!isset($_SESSION["login"]))
    header("location:../site/login.php");
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";

$objclientesDAO = new ClientesDAO();
$retorno = $objclientesDAO->listar();

if(isset($_POST["editarOK"]))
echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
echo "<h2>Erro ao editar!</h2>";

echo "<div id='divTabelaListar'>";
echo "<table id='tabelaListar'>";
    echo "<tr><td><a href='inserir.php'>inserir</a><br></td></tr>";
    foreach($retorno as $linha){
        echo "<tr><td>nome: ".$linha["nome"]."</td></tr>";
        echo "<tr><td>contato:" .$linha["contato"]."</td></tr>";
        echo "<tr><td>cpf: ".$linha["cpf"]."</td></tr>";
        echo "<tr><td>usuario:" .$linha["usuario"]."</td><tr>";
        echo "<tr><td>senha:" .$linha["senha"]."</td><tr>";
        echo "<tr><td>
            <a href='editar.php?idCliente=".$linha["idCliente"]."'>
            editar</a>
            <a href='excluir.php?idCliente=".$linha["idCliente"]."'>
            excluir</a>
            </td></tr>
        ";
        echo "<tr><td><br /></td></tr>";
    }     
echo "</table>";
echo "</div>";

require_once "../sobreEmpresa/footer.php";