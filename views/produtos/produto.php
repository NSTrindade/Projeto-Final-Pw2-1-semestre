<?php

// inclui a conexao ao banco de dados
require_once '../../includes/auth_functions.php';
require_once '../../includes/db_connection.php';

// obetem e valida o id do produto
$id_produto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$produto = null; // Inicializa a variável $produto

// se o ID não for válido ou não for fornecido, não há necessidade de consultar o banco.
if (!$id_produto) {
} else {
    // busca o produto no banco de dados
    try {
        // a query SQL usa um placeholder (:id) para prevenir SQL Injection.
        $sql = "SELECT id, nome, descricao, preco, imagem FROM Produto WHERE id = :id";
        
        // prepara a declaração
        $stmt = $pdo->prepare($sql);
        
        // associa o valor do ID ao placeholder e executa a query
        $stmt->execute([':id' => $id_produto]);
        
        // busca o resultado como um array associativo. 
        $produto = $stmt->fetch();

    } catch (PDOException $e) {
        die("Erro ao consultar o banco de dados: " . $e->getMessage());
    }
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
    <title><?php echo $produto ? htmlspecialchars($produto['nome']) : 'Produto não encontrado'; ?> - UrbanStyle</title>
</head>
<body>
    <div class="header">
        <h1>UrbanStyle</h1>
        <p>Detalhes do Produto</p>
    </div>

    <nav class="nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Início</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php">Produtos</a></li>
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

    <main class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'added_to_cart'): ?>
            <div class="alert alert-success">
                Produto adicionado ao carrinho com sucesso!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'database_error'): ?>
            <div class="alert alert-danger">
                Erro ao adicionar produto ao carrinho. Tente novamente.
            </div>
        <?php endif; ?>

        <?php
        // exibir os detalhes do produto ou uma mensagem de erro
        
        // verifica se a variável $produto contém dados (ou seja, se o produto foi encontrado)
        if ($produto):
        ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="produto-imagem">
                        <?php
                        // exibe a imagem se o campo 'imagem' não estiver vazio no banco
                        if (!empty($produto['imagem'])):
                            $caminho_imagem = '/Projeto-Final-Pw2-1-semestre-main/uploads/' . htmlspecialchars($produto['imagem']);
                        ?>
                            <img src="<?php echo $caminho_imagem; ?>" alt="Imagem de <?php echo htmlspecialchars($produto['nome']); ?>" class="img-fluid rounded">
                        <?php else: ?>
                            <div class="placeholder-image">
                                <span>Sem imagem disponível</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="produto-info">
                        <h1 class="produto-nome"><?php echo htmlspecialchars($produto['nome']); ?></h1>
                        <p class="produto-descricao"><?php echo nl2br(htmlspecialchars($produto['descricao'])); ?></p>
                        <div class="produto-preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
                        
                        <?php if (isLoggedIn()): ?>
                            <form action="/Projeto-Final-Pw2-1-semestre-main/controllers/adicionar_carrinho.php" method="POST" class="mt-3">
                                <input type="hidden" name="produto_id" value="<?php echo $produto['id']; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="quantidade" class="form-label">Quantidade:</label>
                                        <input type="number" name="quantidade" id="quantidade" value="1" min="1" class="form-control">
                                    </div>
                                    <div class="col-md-8 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary btn-lg">Adicionar ao Carrinho</button>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="mt-3">
                                <a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/login.php" class="btn btn-primary btn-lg">
                                    Faça login para comprar
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mt-4">
                            <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="btn btn-secondary">
                                ← Voltar para Produtos
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        else:
        // se $produto for falso (ou nulo), significa que o ID era inválido ou o produto não existe
        ?>

            <div class="text-center">
                <h1>Produto não encontrado!</h1>
                <p>O produto que você está procurando não existe ou o link está incorreto.</p>
                <a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="btn btn-primary">
                    Voltar para a lista de produtos
                </a>
            </div>

        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>