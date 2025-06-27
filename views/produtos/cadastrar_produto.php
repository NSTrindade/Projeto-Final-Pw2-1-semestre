<?php
require_once '../../includes/auth_functions.php';
requireAdmin(); // Verifica se o usuário é administrador
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/admin.css" rel="stylesheet">
    <title>UrbanStyle - Cadastrar Produto</title>
</head>
<body>
    <div class="admin-header">
        <h1>Cadastrar Novo Produto</h1>
        <p>Adicione um novo item ao catálogo</p>
    </div>

    <nav class="admin-nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/dashboard.php">Dashboard</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php">Produtos</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="active">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Ver Site</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/controllers/logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <form action="/Projeto-Final-Pw2-1-semestre-main/controllers/create.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="4" required></textarea>
                </div>
                
                <div class="form-group mb-3">
                    <label for="preco">Preço (R$)</label>
                    <input type="number" id="preco" name="preco" class="form-control" step="0.01" min="0" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Formatos aceitos: JPG, PNG, GIF</small>
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
