<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css" />
</head>
<body>

</body>
</html>
<?php
require_once "../sobreEmpresa/header.php";
include_once "../class/clientes.class.php";
include_once "../class/clientesDAO.class.php";

// Tenta pegar o ID do cliente via GET; se não vier, assume 0 ou outro valor padrão
$id = isset($_GET["idCliente"]) ? $_GET["idCliente"] : 0;

$objDAO = new ClientesDAO();
$retorno = $objDAO->retornarUm($id);

// Se não encontrar o cliente, cria um array vazio para não quebrar o formulário
if (!$retorno) {
    $retorno = [
        "idCliente" => 0,
        "nome" => "",
        "senha" => "",
        "usuario" => "",
        "contato" => "",
        "cpf" => ""
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <form action="editar_ok.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($retorno["nome"]) ?>" />
        <br><br>

        <input type="hidden" name="idCliente" value="<?= htmlspecialchars($retorno["idCliente"]) ?>" />

        <label>Senha:</label>
        <input type="text" name="senha" value="<?= htmlspecialchars($retorno["senha"]) ?>" />
        <br><br>

        <label>Usuário:</label>
        <input type="text" name="usuario" value="<?= htmlspecialchars($retorno["usuario"]) ?>" />
        <br><br>

        <label>Contato:</label>
        <input type="number" name="contato" value="<?= htmlspecialchars($retorno["contato"]) ?>" />
        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($retorno["cpf"]) ?>" />
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>
<footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
    <p>Filmoteca © 2025</p>
    <nav>
        <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> |
        <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> |
        <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
    </nav>
</footer>