<link rel="stylesheet" type="text/css" href="../estilo.css" />

<?php
require_once "../sobreEmpresa/header.php";
include_once "../class/categorias.class.php";
include_once "../class/categoriasDAO.class.php";
$objcategorias = new CategoriasDAO();
$categorias = $objcategorias->listar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="inserir_ok.php" method="post" enctype="multipart/form-data">
        Nome:
        <input type="text" name="nome" />
        <br>
        Preço:
        <input type="number" name="preco" />
        <br>
        Genero:
        <select name="genero">
            <?php
            $con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");

            $categorias = mysqli_query($con, "SELECT * FROM categorias");

            while ($cadaCategoria = mysqli_fetch_assoc($categorias)) {
                echo "<option value='" . $cadaCategoria['idCategoria'] . "'>" . $cadaCategoria['nome'] . "</option>";
            }

            ?>
        </select>
        <br>
        Classificação etária:
        <input type="text" name="classificacaoEtaria" />
        <br>
        ano lançamento:
        <input type="number" name="anoLancamento" max="9999" />
        <br>
        Descrição:
        <input type="text" name="descricao" />
        <br>
        Duração:
        <input type="text" name="duracao" />
        <br>
        trilha sonora:
        <input type="text" name="trilhaSonora" />
        <br>
        <input type="file" name="imagem[]" multiple />
        <br />
        <label>Ofertar: </label>
        <input type="number" name="ofertar" />
        <br />
        <button type="submit">enviar</button>
        <br>
    </form>
    <footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
        <p>Filmoteca © 2025</p>
        <nav>
            <a href="sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> |
            <a href="sobreEmpresa/contato.php" style="color:white;">Contato</a> |
            <a href="sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
        </nav>
    </footer>
</body>

</html>