<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/admin.css" rel="stylesheet">
    <title>UrbanStyle - Dashboard Admin</title>
</head>
<body>
    <div class="admin-header">
        <h1>UrbanStyle - Painel Administrativo</h1>
        <p>Gerencie sua loja</p>
    </div>

    <nav class="admin-nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Semestral-pw2/views/admin/dashboard.php" class="active">Dashboard</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/produtos/cadastrar_produto.php">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/admin/relatorios.php">Relatórios</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/site/inicio.php">Ver Site</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-number">150</div>
                <div class="stat-label">Produtos Cadastrados</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">89</div>
                <div class="stat-label">Pedidos Este Mês</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">1.2K</div>
                <div class="stat-label">Usuários Registrados</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">R$ 15.8K</div>
                <div class="stat-label">Faturamento Mensal</div>
            </div>
        </div>

        <div class="admin-section">
            <h3>Ações Rápidas</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/Projeto-Semestral-pw2/views/produtos/cadastrar_produto.php" class="btn btn-primary">Novo Produto</a>
                <a href="#" class="btn btn-secondary">Ver Pedidos</a>
                <a href="#" class="btn btn-secondary">Gerenciar Usuários</a>
                <a href="/Projeto-Semestral-pw2/views/admin/relatorios.php" class="btn btn-secondary">Relatórios</a>
            </div>
        </div>

        <div class="admin-section">
            <h3>Produtos Recentes</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Camiseta Streetwear</td>
                        <td>R$ 89,90</td>
                        <td>25</td>
                        <td>
                            <a href="#" class="btn btn-primary" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;">Editar</a>
                            <a href="#" class="btn btn-danger" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Moletom Urban</td>
                        <td>R$ 149,90</td>
                        <td>15</td>
                        <td>
                            <a href="#" class="btn btn-primary" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;">Editar</a>
                            <a href="#" class="btn btn-danger" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
