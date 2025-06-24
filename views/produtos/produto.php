<?php

// inclui a conexao ao banco de dados
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $produto ? htmlspecialchars($produto['nome']) : 'Produto não encontrado'; ?> - Minha Loja</title>
    
    <!-- link css -->
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/produtos.css">
</head>
<body>

    <header>
        <nav>
            <a href="inicio.php">Início</a>
            <a href="produtos.php">Todos os Produtos</a>
            <a href="sobre.php">Sobre</a>
        </nav>
    </header>

    <main class="container-produto">
        <?php
        // exibir os detalhes do produto ou uma mensagem de erro
        
        // verifica se a variável $produto contém dados (ou seja, se o produto foi encontrado)
        if ($produto):
        ?>

            <div class="produto-detalhe">
                <h1><?php echo htmlspecialchars($produto['nome']); ?></h1>

                <div class="produto-conteudo">
                    <div class="produto-imagem">
                        <?php
                        // exibe a imagem se o campo 'imagem' não estiver vazio no banco
                        if (!empty($produto['imagem'])):
                            $caminho_imagem = '../../uploads/' . htmlspecialchars($produto['imagem']);
                        ?>
                            <img src="<?php echo $caminho_imagem; ?>" alt="Imagem de <?php echo htmlspecialchars($produto['nome']); ?>">
                        <?php else: ?>
                            <img src="../../assets/img/placeholder.png" alt="Sem imagem disponível">
                        <?php endif; ?>
                    </div>

                    <div class="produto-info">
                        <p class="descricao"><?php echo nl2br(htmlspecialchars($produto['descricao'])); ?></p>
                        <p class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                        
                        <button class="btn-comprar">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>

        <?php
        else:
        // se $produto for falso (ou nulo), significa que o ID era inválido ou o produto não existe
        ?>

            <div class="erro-produto">
                <h1>Produto não encontrado!</h1>
                <p>O produto que você está procurando não existe ou o link está incorreto.</p>
                <a href="produtos.php" class="btn">Voltar para a lista de produtos</a>
            </div>

        <?php endif; ?>
    </main>

    <footer>
        <p>© <?php echo date('Y'); ?> Sua Loja de Roupas. Todos os direitos reservados.</p>
    </footer>

</body>
</html>