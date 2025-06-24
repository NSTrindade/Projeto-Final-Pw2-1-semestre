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
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="active">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/relatorios.php">Relatórios</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Ver Site</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <form>
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="4" required></textarea>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="preco">Preço (R$)</label>
                        <input type="number" id="preco" name="preco" class="form-control" step="0.01" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="estoque">Quantidade em Estoque</label>
                        <input type="number" id="estoque" name="estoque" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control" required>
                        <option value="">Selecione uma categoria</option>
                        <option value="camisetas">Camisetas</option>
                        <option value="moletons">Moletons</option>
                        <option value="calcas">Calças</option>
                        <option value="tenis">Tênis</option>
                        <option value="acessorios">Acessórios</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/dashboard.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
