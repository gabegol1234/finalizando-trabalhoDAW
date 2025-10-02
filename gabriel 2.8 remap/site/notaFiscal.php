<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css"/>
</head>
<body>
<header>
<img src="../imgsite/logo.png" alt="Logo" style="height: 150px; width: 200px;/* ajuste conforme necessário */">
</header>
    <style>
        #tituloNota {
            font-size: 30px;
        }
        td, th {
            border: 1px solid blue;
            text-align: center;
        }
        table {
            margin: auto;
            border: 1px solid black;
            width: fit-content;
            height: fit-content;
            thead {
                tr {
                    th {
                        
                    }
                }
            }
        }
    </style>
    <?php
        session_start();

        require_once "../class/filmesDAO.class.php";
        require_once "../class/filmes_has_vendasDAO.class.php";
        require_once "../class/vendas.class.php";
        require_once "../class/vendasDAO.class.php";

        $total = 0;

        $objFilmesDAO = new FilmesDAO();
        $objFilmes_has_vendasDAO = new Filmes_has_vendasDAO();

        $idVenda = $_POST['idVenda'];

        $objVendas = new Vendas();
        $objVendasDAO = new VendasDAO();

        $objVendas = $objVendasDAO->listar($idVenda);
    ?>
</head>
<body>
    <a href="index.php"><button style="font-size: 15px; font-weight: bold;">Retornar à página inicial</button></a>
    <table>
        <thead>
            <tr>
                <th colspan="5" id="tituloNota">Nota Fiscal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="5">Venda</th>
            </tr>
            <tr>
                <td>ID da venda</td>
                <td>Data da venda</td>
                <td>Status da venda</td>
                <td>Forma de pagamento</td>
                <td>Entrega</td>
            </tr>
            <tr>
                <td><?=$objVendas['idVenda']?></td>
                <td><?=$objVendas['dataVenda']?></td>
                <?php
                    switch($objVendas['statusVenda']) {
                        case 1:
                            echo '<td>Em análise</td>';
                            break;
                        case 2:
                            echo '<td>Autorizada</td>';
                            break;
                        case 3:
                            echo '<td>Rejeitada</td>';
                            break;
                    }
                    switch($objVendas['pagamento']) {
                        case 1:
                            echo '<td>Dinheiro</td>';
                            break;
                        case 2:
                            echo '<td>Pix</td>';
                            break;
                        case 3:
                            echo '<td>Cartão</td>';
                            break;
                        case 4;
                            echo '<td>Bitcoin</td>';
                            break;
                    }
                ?>
                <td><?=$objVendas['entrega']?></td>
            </tr>
            <tr>
                <th colspan="5">Filmes adquiridos</th>
            </tr>
            <tr>
                <td colspan="5">
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Preço</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($objFilmes_has_vendasDAO->retornarIdFilme($idVenda) as $rodadaIdFilme) {
                                    $cadaFilme = $objFilmesDAO->retornarUm($rodadaIdFilme[0]);
                                    $total += $cadaFilme['preco'];
                                    echo "<tr>";
                                        echo "<td>" . $cadaFilme['nome'] . "</td>";
                                        echo "<td>" . $cadaFilme['preco'] . "</td>";
                                    echo "</tr>";                            
                                }
                            ?>
                        </tbody>
                    </table>
                </td>
                <!--<td>Gênero</td>
                <td>Classificação etária</td>
                <td>Ano de lançamento</td>
                <td>Descrição</td>
                <td>Duração</td>
                <td>Trilha Sonora</td>-->
            </tr>
            <tr>
                <th colspan="5">Total</th>
            </tr>
            <tr>
                <td colspan="5">R$ <?=$total?></td>
            </tr>
        </tbody>
    </table>
</body>
</body>
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
</html>