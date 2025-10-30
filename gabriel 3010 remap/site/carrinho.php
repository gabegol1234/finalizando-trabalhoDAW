<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css" />
</head>

<body>

    <header style="background-color:#1c1c1c; padding:10px; color:white;">
        <h1>🎬 Filmoteca</h1>
    </header>

    <?php
    session_start();
    include_once "../class/filmes.class.php";
    include_once "../class/filmesDAO.class.php";

    $total = 0;

    $objFilmesDAO = new FilmesDAO();

    if (isset($_SESSION["carrinho"])) {
        $carrinho = $_SESSION["carrinho"];
    } else {
        $carrinho = [];
    }

    if (!$carrinho) {
        echo "<p>Seu carrinho está vazio.</p>";
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
            <p>Filmoteca © 2025</p>
            <nav>
                <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> |
                <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> |
                <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
            </nav>
        </footer>

        <?php
        exit;
    }

    $total = 0;
    ?>
    <div class="conteudo">
        <h2>Seu Carrinho</h2>

        <form action="carrinho_ok.php" method="POST">
            <table border class="tabela">
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
                        <td><strong>Total:</strong></td>


                        <td><strong>R$ <?= number_format($total, 2, ',', '.'); ?></strong></td>
                    </tr>




                    <tr>
                        <td>
                            <strong>
                                Forma de pagamento:

                            </strong>
                        </td>
                        <td>
                            <select name="pagamento">
                                <option value="1" selected>Dinheiro</option>
                                <option value="2">Pix</option>
                                <option value="3">Cartão</option>
                                <option value="4">Bitcoin</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Endereço de entrega:
                            </strong>
                        </td>

                        </td>
                        <td>
                            <input type="text" name="entrega" required>
                        </td>
                    </tr>

                    <input type="hidden" name="total" value="<?= $total ?>" />
                    <tr >
                        <td>
                            <strong >
                                <button type="submit">Finalizar compra</button>
                        </td>
                    </tr>
                    </strong>


                </tbody>
            </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
        <p>Filmoteca © 2025</p>
        <nav>
            <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> |
            <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> |
            <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
        </nav>
    </footer>

    </form>