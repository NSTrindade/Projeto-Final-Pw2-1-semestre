<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/global.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/produtos.css" rel="stylesheet">
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
                <li><a href="/Projeto-Semestral-pw2/views/site/inicio.php">Início</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/produtos/home.php" class="active">Produtos</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/site/sobre.php">Sobre</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/site/contato.php">Contato</a></li>
                <li><a href="/Projeto-Semestral-pw2/views/auth/login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="search-bar">
            <h3 style="color: #F0BE01; margin-bottom: 1rem;">Encontre seu estilo</h3>
            <div class="search-input">
                <input type="text" class="form-control" placeholder="Buscar produtos...">
            </div>
        </div>

        <div class="produtos-grid">
            <!-- Exemplo de produtos - aqui virão os dados do banco -->
            <div class="produto-card">
                <div class="produto-img">
                    <span>Imagem do Produto</span>
                </div>
                <div class="produto-info">
                    <h4 class="produto-nome">Camiseta Streetwear</h4>
                    <p class="produto-descricao">Camiseta 100% algodão com estampa exclusiva, perfeita para o dia a dia urbano.</p>
                    <div class="produto-preco">R$ 89,90</div>
                    <div class="produto-actions">
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                        <a href="#" class="btn btn-secondary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>

            <div class="produto-card">
                <div class="produto-img">
                    <span>Imagem do Produto</span>
                </div>
                <div class="produto-info">
                    <h4 class="produto-nome">Moletom Urban</h4>
                    <p class="produto-descricao">Moletom com capuz, ideal para os dias mais frios, com design moderno e confortável.</p>
                    <div class="produto-preco">R$ 149,90</div>
                    <div class="produto-actions">
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                        <a href="#" class="btn btn-secondary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>

            <div class="produto-card">
                <div class="produto-img">
                    <span>Imagem do Produto</span>
                </div>
                <div class="produto-info">
                    <h4 class="produto-nome">Calça Cargo</h4>
                    <p class="produto-descricao">Calça cargo com múltiplos bolsos, estilo militar adaptado para o streetwear.</p>
                    <div class="produto-preco">R$ 199,90</div>
                    <div class="produto-actions">
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                        <a href="#" class="btn btn-secondary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>

            <div class="produto-card">
                <div class="produto-img">
                    <span>Imagem do Produto</span>
                </div>
                <div class="produto-info">
                    <h4 class="produto-nome">Tênis Street</h4>
                    <p class="produto-descricao">Tênis casual com design urbano, confortável para uso diário.</p>
                    <div class="produto-preco">R$ 299,90</div>
                    <div class="produto-actions">
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                        <a href="#" class="btn btn-secondary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
