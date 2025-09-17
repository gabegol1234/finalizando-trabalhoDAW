<?php
session_start();
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$total = 0;

$objFilmesDAO = new FilmesDAO();

if(isset($_SESSION["carrinho"])) {
    $carrinho = $_SESSION["carrinho"];
} else {
    $carrinho = [];
}

if (!$carrinho) {
    echo "<p>Seu carrinho está vazio.</p>";
    exit;
}

$total = 0;
?>

<h2>Seu Carrinho</h2>

<form action="carrinho_ok.php" method="POST">
<table border>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($carrinho as $index => $idFilme) {
            $filme = $objFilmesDAO->retornarUm($idFilme);

            if ($filme && isset($filme['nome'])) {
                $total += $filme['preco'];
                ?>
                <tr>
                    <td><?= htmlspecialchars($filme['nome']); ?></td>
                    <td>R$ <?= number_format($filme['preco'], 2, ',', '.'); ?></td>
                </tr>
                <?php
            } else {
                echo "<tr><td colspan='3'>Produto não encontrado (ID: $idFilme)</td></tr>";
            }
        }
        ?>
        <tr>
            <td colspan="3"><strong>Total:</strong></td>
        </tr>
        <tr>
            <td colspan="3"><strong>R$ <?= number_format($total, 2, ',', '.'); ?></strong></td>
        </tr>
    </tbody>
</table>

<p>
    Forma de pagamento: 
    <select name="pagamento">
        <option value="1" selected>Dinheiro</option>
        <option value="2">Pix</option>
        <option value="3">Cartão</option>
        <option value="4">Bitcoin</option>
    </select>
    <br />
    Endereço de entrega: <input type="text" name="entrega" required>
</p>

<input type="hidden" name="total" value="<?=$total?>"/>

<button type="submit">Finalizar compra</button>
</form>
