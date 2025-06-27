<?php
require_once '../../includes/auth_functions.php';
requireAdmin(); // Verifica se o usuário é administrador

require_once '../../includes/db_connection.php';

// Buscar estatísticas reais do banco de dados
try {
    // Contar produtos
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM Produto");
    $total_produtos = $stmt->fetch()['total'];
    
    // Contar usuários
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM Usuario WHERE papel = 'cliente'");
    $total_usuarios = $stmt->fetch()['total'];
    
    // Buscar produtos recentes
    $stmt = $pdo->query("SELECT * FROM Produto ORDER BY id DESC LIMIT 5");
    $produtos_recentes = $stmt->fetchAll();
    
} catch (PDOException $e) {
    $total_produtos = 0;
    $total_usuarios = 0;
    $produtos_recentes = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/admin.css" rel="stylesheet">
    <title>UrbanStyle - Dashboard Admin</title>
</head>
<body>
    <div class="admin-header">
        <h1>UrbanStyle - Painel Administrativo</h1>
        <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
    </div>

    <nav class="admin-nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/dashboard.php" class="active">Dashboard</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/relatorios.php">Relatórios</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Ver Site</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/controllers/logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-number"><?php echo $total_produtos; ?></div>
                <div class="stat-label">Produtos Cadastrados</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">0</div>
                <div class="stat-label">Pedidos Este Mês</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number"><?php echo $total_usuarios; ?></div>
                <div class="stat-label">Usuários Registrados</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">R$ 0,00</div>
                <div class="stat-label">Faturamento Mensal</div>
            </div>
        </div>

        <div class="admin-section">
            <h3>Ações Rápidas</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="btn btn-primary">Novo Produto</a>
                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="btn btn-secondary">Gerenciar Produtos</a>
                <a href="#" class="btn btn-secondary">Ver Pedidos</a>
                <a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/relatorios.php" class="btn btn-secondary">Relatórios</a>
            </div>
        </div>

        <div class="admin-section">
            <h3>Produtos Recentes</h3>
            <?php if (empty($produtos_recentes)): ?>
                <p>Nenhum produto cadastrado ainda.</p>
                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="btn btn-primary">Cadastrar Primeiro Produto</a>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos_recentes as $produto): ?>
                            <tr>
                                <td><?php echo $produto['id']; ?></td>
                                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/edit.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;">Editar</a>
                                    <a href="/Projeto-Final-Pw2-1-semestre-main/controllers/delete.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger" style="padding: 0.3rem 0.8rem; font-size: 0.8rem;" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
