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
        <?php
        session_start();
if(!isset($_SESSION["login"]))
    header("location:../site/login.php");
include_once "../class/vendas.class.php";
include_once "../class/vendasDAO.class.php";

$objvendasDAO = new VendasDAO();
$retorno = $objvendasDAO->listarVendas();

if(isset($_POST["editarOK"]))
echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
echo "<h2>Erro ao editar!</h2>";

echo "<div id='divTabelaListar'>";
echo "<table id='tabelaListar'>";
    echo "<tr><td><a href='inserir.php'>inserir</a><br></td></tr>";
    foreach($retorno as $linha){
        echo "<tr><td>dataVenda: ".$linha["dataVenda"]."</td></tr>";
        echo "<tr><td>statusVenda:" .$linha["statusVenda"]."</td></tr>";
        echo "<tr><td>idVenda: ".$linha["idVenda"]."</td></tr>";
        echo "<tr><td>pagamento:" .$linha["pagamento"]."</td><tr>";
        echo "<tr><td>entrega:" .$linha["entrega"]."</td><tr>";
        echo "<tr><td>idCliente:" .$linha["idCliente"]."</td><tr>";       
         echo "<tr><td>
            <a href='editar.php?idVenda=".$linha["idVenda"]."'>
            editar</a>
            <a href='excluir.php?idVenda=".$linha["idVenda"]."'>
            excluir</a>
            </td></tr>
        ";
        echo "<tr><td><br /></td></tr>";
    }     
echo "</table>";
echo "</div>";
?>
            <!-- RODAPE DAQUI PARA BAIXO -->

        </main>
    </div>


    <script src="/assets/js/main.js"></script>
</body>

</html>