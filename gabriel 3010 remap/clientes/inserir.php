<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css" />
</head>
<body>
    <?php
    require_once "../sobreEmpresa/header.php";
    ?>
    <form action="inserir_ok.php" method="POST">
        nome:
        <input type="text" name="nome"/>
        <br>
        usuario:
        <input type="text" name="usuario"/>
        <br>
        contato:
        <input type="number" name="contato"/>
        <br>
        cpf:
        <input type="text" name="cpf"/>
        <br>
        senha:
        <input type="text" name="senha"/>
        <br>
        <button type="submit">enviar</button>
        <br>
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