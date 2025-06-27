<?php
require_once '../../includes/auth_functions.php';
require_once '../../includes/db_connection.php';

// Buscar todos os produtos
$produtos = [];

try {
    $sql = "SELECT * FROM Produto ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro ao buscar produtos: " . $e->getMessage());
}

$currentUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/produtos.css" rel="stylesheet">
    <title>UrbanStyle - Produtos</title>
</head>
<body>
    <div class="header">
        <h1>UrbanStyle</h1>
        <p>Nossos Produtos</p>
    </div>

    <nav class="nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Início</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="active">Produtos</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/sobre.php">Sobre</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/contato.php">Contato</a></li>
                <?php if (isLoggedIn()): ?>
                    <?php if (isAdmin()): ?>
                        <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/dashboard.php">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="/Projeto-Final-Pw2-1-semestre-main/controllers/logout.php">Sair (<?php echo htmlspecialchars($currentUser['nome']); ?>)</a></li>
                <?php else: ?>
                    <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="search-bar">
            <h3 style="color: #F0BE01; margin-bottom: 1rem;">Nossos Produtos</h3>
            
            <?php if (isAdmin()): ?>
                <div class="mt-3">
                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="btn btn-success">Cadastrar Novo Produto</a>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
            <div class="alert alert-success">
                Produto excluído com sucesso!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success">
                Produto cadastrado com sucesso!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
            <div class="alert alert-success">
                Produto atualizado com sucesso!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?php 
                switch ($_GET['error']) {
                    case 'invalid_id':
                        echo 'ID do produto inválido.';
                        break;
                    case 'product_not_found':
                        echo 'Produto não encontrado.';
                        break;
                    case 'delete_failed':
                        echo 'Erro ao excluir produto. Tente novamente.';
                        break;
                    case 'database_error':
                        echo 'Erro no banco de dados. Tente novamente.';
                        break;
                    default:
                        echo 'Ocorreu um erro. Tente novamente.';
                }
                ?>
            </div>
        <?php endif; ?>

        <div class="produtos-grid">
            <?php if (empty($produtos)): ?>
                <div class="col-12 text-center">
                    <p>Nenhum produto cadastrado ainda.</p>
                    <?php if (isAdmin()): ?>
                        <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php" class="btn btn-primary">Cadastrar Primeiro Produto</a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="produto-card">
                        <div class="produto-img">
                            <?php if ($produto['imagem']): ?>
                                <img src="/Projeto-Final-Pw2-1-semestre-main/uploads/<?php echo htmlspecialchars($produto['imagem']); ?>" 
                                     alt="<?php echo htmlspecialchars($produto['nome']); ?>" style="width: 100%; height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <span>Imagem do Produto</span>
                            <?php endif; ?>
                        </div>
                        <div class="produto-info">
                            <h4 class="produto-nome"><?php echo htmlspecialchars($produto['nome']); ?></h4>
                            <p class="produto-descricao"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                            <div class="produto-preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
                            <div class="produto-actions">
                                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/produto.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary">Ver Detalhes</a>
                                <?php if (isAdmin()): ?>
                                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/edit.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Editar</a>
                                    <a href="/Projeto-Final-Pw2-1-semestre-main/controllers/delete.php?id=<?php echo $produto['id']; ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
