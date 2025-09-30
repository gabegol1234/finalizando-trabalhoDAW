<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Painel do Administrador</title>
<link rel="stylesheet" type="text/css"href="../style.css">
</head>
<body>

<header>
    <h1>Painel do Administrador</h1>
    <a href="#" class="logout">Sair</a>
</header>

<main>

    <h2>Filmes cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Filme</th>
                <th>Preço (R$)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Matrix</td>
                <td>29,90</td>
                <td class="actions">
                    <a href="#">Editar</a>
                    <a href="#" class="delete">Excluir</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Inception</td>
                <td>35,00</td>
                <td class="actions">
                    <a href="#">Editar</a>
                    <a href="#" class="delete">Excluir</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Interstellar</td>
                <td>40,00</td>
                <td class="actions">
                    <a href="#">Editar</a>
                    <a href="#" class="delete">Excluir</a>
                </td>
            </tr>
        </tbody>
    </table>

    <h2>Adicionar novo filme</h2>

    <form>
        <label for="nome">Nome do Filme:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="preco">Preço (R$):</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0" required>

        <button type="submit">Adicionar Filme</button>
    </form>

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
