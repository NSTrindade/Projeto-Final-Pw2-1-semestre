<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/global.css" rel="stylesheet">
    <title>UrbanStyle - Login</title>
</head>
<body>
    <div class="container" style="max-width: 500px; margin-top: 5rem;">
        <div class="card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="color: #F0BE01; font-size: 2.5rem;">UrbanStyle</h1>
                <p>Faça login em sua conta</p>
            </div>

            <form>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem;">Entrar</button>
                    <p>Não tem uma conta? <a href="/Projeto-Semestral-pw2/views/auth/cadastro_usuario.php" style="color: #F0BE01;">Cadastre-se</a></p>
                    <a href="/Projeto-Semestral-pw2/views/site/inicio.php" class="btn btn-secondary">Voltar ao Início</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
