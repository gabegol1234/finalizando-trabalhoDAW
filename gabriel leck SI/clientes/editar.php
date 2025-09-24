<?php
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
