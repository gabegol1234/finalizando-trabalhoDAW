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