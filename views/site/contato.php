<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Projeto-Semestral-pw2/assets/css/global.css" rel="stylesheet">
    <title>UrbanStyle - Contato</title>
</head>
<body>
    <div class="header">
        <h1>UrbanStyle</h1>
        <p>Entre em contato conosco</p>
    </div>

    <div class="container">
        <div class="card">
            <h3>Fale Conosco</h3>
            <form>
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="assunto">Assunto</label>
                    <input type="text" id="assunto" name="assunto" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" class="form-control" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                <a href="/Projeto-Semestral-pw2/views/site/inicio.php" class="btn btn-secondary">Voltar</a>
            </form>
        </div>

        <div class="card">
            <h3>Informações de Contato</h3>
            <p><strong>Endereço:</strong> Rua da Moda Urbana, 123 - Centro, São Paulo - SP</p>
            <p><strong>Telefone:</strong> (11) 9999-9999</p>
            <p><strong>E-mail:</strong> contato@urbanstyle.com.br</p>
            <p><strong>Horário de Atendimento:</strong> Segunda a Sexta, das 9h às 18h</p>
        </div>
    </div>
</body>
</html>
