<?php
session_start();

include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";

$objfilmesDAO = new FilmesDAO();

$carrinho = $_SESSION['carrinho'] ?? [];

if (empty($carrinho)) {
    echo "<p>Seu carrinho está vazio.</p>";
    exit;
}

// --- Dados fictícios da loja ---
$loja_nome = "Filmoteca";
$loja_cnpj = "12.345.678/0001-99";
$loja_endereco = "Rua das Estrelas, 123 - São Paulo/SP";

// --- Dados fictícios do cliente ---
$cliente_nome = $_SESSION['cliente_nome'] ?? "Fernando da Cruz";
$cliente_cpf = $_SESSION['cliente_cpf'] ?? "000.035.222-00";

// Número da nota
$numero_nota = rand(1000, 9999);

// Data da emissão
$data_emissao = date("d/m/Y H:i");

$total = 0;
$total_itens = 0;
$produtos_comprados = []; // Para resumo
?>

<h2 style="text-align:center;">Nota Fiscal (Recibo Interno)</h2>
<hr>
<p><strong><?=$loja_nome?></strong><br>
CNPJ: <?=$loja_cnpj?><br>
Endereço: <?=$loja_endereco?></p>

<p><strong>Cliente:</strong> <?=$cliente_nome?><br>
<strong>CPF:</strong> <?=$cliente_cpf?></p>

<p><strong>Nº Nota:</strong> <?=$numero_nota?><br>
<strong>Data:</strong> <?=$data_emissao?></p>
<hr>

<!-- Tabela com itens comprados -->
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>Filme</th>
        <th>Qtd</th>
        <th>Preço Unitário</th>
        <th>Subtotal</th>
    </tr>

<?php
foreach ($carrinho as $id_filme => $quantidade) {
    $filme = $objfilmesDAO->retornarUm($id_filme);
    if ($filme && isset($filme['nome'], $filme['preco'])) {
        $subtotal = $filme['preco'] * $quantidade;
        $total += $subtotal;
        $total_itens += $quantidade;

        // Guarda para o resumo
        $produtos_comprados[] = [
            'nome' => $filme['nome'],
            'subtotal' => $subtotal
        ];

        echo "<tr>
            <td>{$filme['nome']}</td>
            <td>{$quantidade}</td>
            <td>R$ ".number_format($filme['preco'], 2, ',', '.')."</td>
            <td>R$ ".number_format($subtotal, 2, ',', '.')."</td>
        </tr>";
    }
}
?>

<tr>
    <td colspan="3" align="right"><strong>Total:</strong></td>
    <td><strong>R$ <?=number_format($total, 2, ',', '.')?></strong></td>
</tr>
</table>

<!-- Resumo da compra -->
<hr>
<h3>Resumo da Compra</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>Produto</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach ($produtos_comprados as $p): ?>
    <tr>
        <td><?=htmlspecialchars($p['nome'])?></td>
        <td>R$ <?=number_format($p['subtotal'], 2, ',', '.')?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td><strong>Total de Itens: <?=$total_itens?></strong></td>
        <td><strong>R$ <?=number_format($total, 2, ',', '.')?></strong></td>
    </tr>
</table>

<p style="text-align:center; margin-top:20px;">
    Obrigado por escolher a nossa loja.<br>
    Volte sempre!!
</p>

<p>
    <a href="index.php">Voltar às Compras</a>
</p>
