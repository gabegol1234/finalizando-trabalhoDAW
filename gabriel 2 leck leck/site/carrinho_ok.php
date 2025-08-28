<?php
session_start();
include_once "../class/vendas.class.php";
include_once "../class/filmes_has_vendas.class.php";
include_once "../class/filmes_has_vendasDAO.class.php";
include_once "../class/vendasDAO.class.php";
include_once "../class/filmesDAO.class.php"; 

// Verifica se o cliente está logado
if (!isset($_SESSION["idCliente"])) {
    echo "Cliente não logado!";
    exit;
}

// Verifica se o carrinho existe e não está vazio
if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
    echo "Carrinho vazio!";
    exit;
}

// Verifica se os dados de pagamento e entrega foram enviados
if (!isset($_POST["pagamento"]) || !isset($_POST["entrega"])) {
    echo "Dados de pagamento ou entrega não enviados!";
    exit;
}

// Cria objeto de venda
$objVendas = new Vendas();
$objVendas->setIdCliente($_SESSION["idCliente"]);
$objVendas->setDataVenda(date("Y-m-d")); // Corrigido para 4 dígitos
$objVendas->setPagamento($_POST["pagamento"]);
$objVendas->setEntrega($_POST["entrega"]);
$objVendas->setStatusVenda("nova compra");

// Insere a venda
$objVendasDAO = new VendasDAO();
$idUltimaVenda = $objVendasDAO->inserir($objVendas);

if ($idUltimaVenda > 0) {
    echo "Venda inserida com sucesso!<br>";

    $objFilmesHasVendas = new filmes_has_vendas();
    $objFilmesHasVendasDAO = new filmes_has_vendasDAO();

    foreach($_SESSION["carrinho"] as $cadaProdutoDoCarrinho) {
        $objFilmesHasVendas->setIdFilme($cadaProdutoDoCarrinho);
        $objFilmesHasVendas->setIdVenda($idUltimaVenda);
        $objFilmesHasVendasDAO->inserir($objFilmesHasVendas);
    }

    // Limpa o carrinho após finalizar a compra
    unset($_SESSION["carrinho"]);
    header("location:notaFiscal.php");
    echo "Compra finalizada!";
} else {
    echo "Erro ao inserir a venda!";
}
