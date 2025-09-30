<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filmoteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../estilo.css"/>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: calc(100vh - 120px); /* ajusta para cabeçalho e rodapé */
            text-align: center;
        }

        .contato {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .contato h2 {
            margin-bottom: 10px;
            color: #1c1c1c;
        }

        .contato p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

    <header style="background-color:#1c1c1c; padding:10px; color:white;">
        <h1>🎬 Filmoteca</h1>
    </header>

    <main>
        <div class="contato">
            <h2>Entre em contato</h2>
            <p>📞 (55) 98476-4321</p>
            <p>ou envie um e-mail para: <strong>contato@filmoteca.com</strong></p>
        </div>
    </main>

    <footer style="background-color:#1c1c1c; color:white; text-align:center; padding:10px;">
        <p>Filmoteca © 2025</p>
        <nav>
            <a href="../sobreEmpresa/sobre.php" style="color:white;">Sobre nós</a> | 
            <a href="../sobreEmpresa/contato.php" style="color:white;">Contato</a> | 
            <a href="../sobreEmpresa/privacidade.php" style="color:white;">Política de Privacidade</a>
        </nav>
    </footer>

</body>
</html>
