<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/admin.css" rel="stylesheet">
    <title>UrbanStyle - Relatórios</title>
</head>
<body>
    <div class="admin-header">
        <h1>Relatórios</h1>
        <p>Acompanhe o desempenho da sua loja</p>
    </div>

    <nav class="admin-nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Semestral-pw2/views/admin/dashboard.php">Dashboard</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/produtos/cadastrar_produto.php">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/admin/relatorios.php" class="active">Relatórios</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/site/inicio.php">Ver Site</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="admin-section">
            <h3>Produtos Mais Vendidos</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Produto</th>
                        <th>Vendas</th>
                        <th>Receita</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1º</td>
                        <td>Camiseta Streetwear</td>
                        <td>45 unidades</td>
                        <td>R$ 4.045,50</td>
                    </tr>
                    <tr>
                        <td>2º</td>
                        <td>Moletom Urban</td>
                        <td>32 unidades</td>
                        <td>R$ 4.796,80</td>
                    </tr>
                    <tr>
                        <td>3º</td>
                        <td>Calça Cargo</td>
                        <td>28 unidades</td>
                        <td>R$ 5.597,20</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="admin-section">
            <h3>Vendas por Categoria</h3>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-number">35%</div>
                    <div class="stat-label">Camisetas</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">25%</div>
                    <div class="stat-label">Moletons</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">20%</div>
                    <div class="stat-label">Calças</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">20%</div>
                    <div class="stat-label">Outros</div>
                </div>
            </div>
        </div>

        <div class="admin-section">
            <h3>Resumo Financeiro</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background-color: rgba(85, 82, 78, 0.2); padding: 1.5rem; border-radius: 0.5rem; text-align: center;">
                    <h4 style="color: #F0BE01;">Receita Total</h4>
                    <p style="font-size: 1.5rem; font-weight: bold;">R$ 15.847,30</p>
                </div>
                <div style="background-color: rgba(85, 82, 78, 0.2); padding: 1.5rem; border-radius: 0.5rem; text-align: center;">
                    <h4 style="color: #F0BE01;">Pedidos</h4>
                    <p style="font-size: 1.5rem; font-weight: bold;">89</p>
                </div>
                <div style="background-color: rgba(85, 82, 78, 0.2); padding: 1.5rem; border-radius: 0.5rem; text-align: center;">
                    <h4 style="color: #F0BE01;">Ticket Médio</h4>
                    <p style="font-size: 1.5rem; font-weight: bold;">R$ 178,06</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
