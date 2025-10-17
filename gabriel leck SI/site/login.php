<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Document</title>
</head>
<body>
    <form action="login_ok.php"method="POST">
    usuario: <input type="text" name="usuario">
    <br>
    Senha: <input type="password" name="senha">
    <br>
     <button type="submit">Enviar</button>
     <div class ="mb-3">
            <div class="g-recaptcha" data-sitekey="6LfEtesrAAAAAP4ObN88-2e6A1fs1CF-4kEDhskl"></div>
     </div>
     </form>
</body>
</html>