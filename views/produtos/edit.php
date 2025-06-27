<?php
require_once '../../includes/auth_functions.php';
requireAdmin(); // Verifica se o usuário é administrador

require_once '../../includes/db_connection.php';

// Verifica se foi passado um ID válido
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: ../produtos/home.php?error=invalid_id");
    exit();
}

// Busca o produto no banco de dados
try {
    $sql = "SELECT * FROM Produto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch();
    
    if (!$produto) {
        header("Location: ../produtos/home.php?error=product_not_found");
        exit();
    }
} catch (PDOException $e) {
    header("Location: ../produtos/home.php?error=database_error");
    exit();
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
    <title>Editar Produto - UrbanStyle</title>
</head>
<body>
    <div class="admin-header">
        <h1>Editar Produto</h1>
        <p>Modifique as informações do produto</p>
    </div>

    <nav class="admin-nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/admin/dashboard.php">Dashboard</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php">Produtos</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/cadastrar_produto.php">Cadastrar Produto</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Ver Site</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/controllers/logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Produto: <?php echo htmlspecialchars($produto['nome']); ?></h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
                            <div class="alert alert-success">
                                Produto atualizado com sucesso!
                            </div>
                        <?php endif; ?>

                        <form action="/Projeto-Final-Pw2-1-semestre-main/controllers/update.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['id']); ?>">
                            
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto</label>
                                <input type="text" class="form-control" id="nome" name="nome" 
                                       value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$)</label>
                                <input type="number" class="form-control" id="preco" name="preco" 
                                       value="<?php echo htmlspecialchars($produto['preco']); ?>" step="0.01" min="0" required>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
                                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
