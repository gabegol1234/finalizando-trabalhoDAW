<?php
session_start();

// Verifica login
if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
    header("Location: login.php");
    exit;
}

// Verifica se o carrinho existe
if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
    echo "<h2>Carrinho vazio! Vá às compras!</h2>";
    exit;
}

include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$objProdutosDAO = new FilmesDAO();

// >>> Garantir que carrinho seja id => quantidade
foreach ($_SESSION["carrinho"] as $key => $value) {
    if (is_numeric($key) && is_numeric($value)) {
        $_SESSION["carrinho"][$value] = 1; // transforma [id1, id2] em [id1 => 1, id2 => 1]
        unset($_SESSION["carrinho"][$key]);
    }
}

// >>> Atualiza a sessão com as quantidades do formulário, se existir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_SESSION["carrinho"] as $id => $qtd) {
        $inputName = "quantidade$id";
        if (isset($_POST[$inputName])) {
            $_SESSION["carrinho"][$id] = max(1, (int)$_POST[$inputName]);
        }
    }
}
?>

<h2>Seu Carrinho</h2>
<form action="notaFiscal.php" method="POST">
<table border>
    <thead>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </thead>
    <tbody>
        <?php
        foreach ($_SESSION["carrinho"] as $id => $quantidade) {
            $retorno = $objProdutosDAO->retornarUm($id);
            if ($retorno && is_array($retorno)) {
                ?>
                <tr>
                    <td><?= $retorno["nome"]; ?></td>
                    <td>R$ <?= number_format($retorno["preco"], 2, ',', '.'); ?></td>
                    <td><input type="number" name="quantidade<?= $id; ?>" value="<?= $quantidade; ?>" min="1"></td>
                </tr>
                <?php
            } else {
                echo "<tr><td colspan='3'>Produto não encontrado (ID: $id)</td></tr>";
            }
        }
        ?>
    </tbody>
</table>

Forma de pagamento: <input type="text" name="pagamento" required><br>
Endereço de entrega: <input type="text" name="entrega" required><br>
<button type="submit">Finalizar compra</button>
</form>
