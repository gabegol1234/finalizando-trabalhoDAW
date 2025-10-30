<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Painel</title>
    <link rel="stylesheet" href="../../estilingue.css">
</head>

<body>
    <header class="header">
        <div>🎬 Filmoteca</div>
        <div style="margin-left:auto" class="text-muted">Administrador</div>
    </header>


    <div class="container app">
        <aside class="sidebar card">
            <nav class="nav">
                <a href="#" class="active">Painel</a>
                <a href="#">Produtos</a>
                <a href="#">Pedidos</a>
                <a href="#">Clientes</a>
                <a href="/user/index.html">Ir para o site do usuário →</a>
            </nav>
            <hr style="margin:12px 0">
            <div class="text-muted">Configurações</div>
            <a href="#">Apagar logs</a>
        </aside>


        <main class="main">
            <div class="card">
                <div id="alerts"></div>
                <h2>Resumo rápido</h2>
                <p class="text-muted">Visão geral do sistema.</p>
                <div class="admin-stats">
                    <div class="stat">Vendas hoje<br><strong>12</strong></div>
                    <div class="stat">Usuários ativos<br><strong>87</strong></div>
                    <div class="stat">Pedidos pendentes<br><strong>5</strong></div>
                </div>


                <section style="margin-top:18px">
                    <h3>Ações</h3>
                    <p class="text-muted">Use estes botões para testar mensagens de sucesso/erro.</p>
                    <button class="btn" data-action="simulate" data-target="#alerts">Salvar alteração (simular)</button>
                    <button class="btn secondary" data-action="simulate" data-target="#alerts">Excluir registro
                        (simular)</button>
                </section>
            </div>


            <div style="margin-top:12px" class="card">
                <h3>Registros</h3>
                <p class="text-muted">Aqui ficaria a listagem; lembre-se de sempre mostrar mensagens ao
                    criar/editar/excluir.</p>
            </div>
        </main>
    </div>


    <script src="/assets/js/main.js"></script>
</body>

</html>