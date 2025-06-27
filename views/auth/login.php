<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Final-Pw2-1-semestre-main/assets/css/global.css" rel="stylesheet">
    <title>UrbanStyle - Login</title>
</head>
<body>

    <nav class="nav">
        <div class="container">
            <ul>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php">Início</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/produtos/home.php">Produtos</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/sobre.php">Sobre</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/site/contato.php">Contato</a></li>
                <li><a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/login.php" class="active">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="max-width: 500px; margin-top: 5rem;">
        <div class="card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="color: #F0BE01; font-size: 2.5rem;">UrbanStyle</h1>
                <p>Faça login em sua conta</p>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'registered'): ?>
                <div class="alert alert-success">
                    Conta criada com sucesso! Faça login para continuar.
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                    switch ($_GET['error']) {
                        case 'empty_fields':
                            echo 'Por favor, preencha todos os campos.';
                            break;
                        case 'invalid_credentials':
                            echo 'E-mail ou senha incorretos.';
                            break;
                        case 'login_required':
                            echo 'Você precisa fazer login para acessar esta página.';
                            break;
                        case 'admin_required':
                            echo 'Acesso restrito. Apenas administradores podem acessar esta área.';
                            break;
                        default:
                            echo 'Ocorreu um erro. Tente novamente.';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form action="../../controllers/login_usuario.php" method="POST">
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required 
                           value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
                </div>
                
                <div class="form-group mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem;">Entrar</button>
                    <p>Não tem uma conta? <a href="/Projeto-Final-Pw2-1-semestre-main/views/auth/cadastro_usuario.php" style="color: #F0BE01;">Cadastre-se</a></p>
                    <a href="/Projeto-Final-Pw2-1-semestre-main/views/site/inicio.php" class="btn btn-secondary">Voltar ao Início</a>
                </div>
            </form>

            <div style="text-align: center; margin-top: 2rem; padding: 1rem; background-color: #f8f9fa; border-radius: 0.375rem;">
                <h6>Credenciais de Administrador:</h6>
                <p class="mb-1"><strong>E-mail:</strong> admin@example.com</p>
                <p class="mb-0"><strong>Senha:</strong> adm1234</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
