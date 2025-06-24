<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/global.css" rel="stylesheet">
    <title>UrbanStyle - Cadastro</title>
</head>
<body>
    <nav class="nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Início</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php" class="active">Produtos</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/sobre.php">Sobre</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/contato.php">Contato</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="max-width: 600px; margin-top: 3rem;">
        <div class="card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="color: #F0BE01; font-size: 2.5rem;">UrbanStyle</h1>
                <p>Crie sua conta</p>
            </div>

            
            <form action="../../controllers/registrar_usuario.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmar_senha">Confirmar Senha</label>
                    <input type="password" id="confirmar_senha" name="confirmar_senha" class="form-control" required>
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem;">Cadastrar</button>
                    <p>Já tem uma conta? <a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/login.php" style="color: #F0BE01;">Faça login</a></p>
                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php" class="btn btn-secondary">Voltar ao Início</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
