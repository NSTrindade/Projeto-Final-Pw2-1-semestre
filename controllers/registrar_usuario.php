<?php

// inclui a parte de conexão ao banco de dados
require_once '../includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // coleta e valida os dados (incluindo o novo campo telefone)
    $nome = trim($_POST['nome']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = trim($_POST['telefone']); // novo campo
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // validações básicas
    if (empty($nome) || !$email || empty($senha)) {
        die("Erro: Nome, e-mail e senha são campos obrigatórios.");
    }
    if ($senha !== $confirmar_senha) {
        die("Erro: As senhas não coincidem.");
    }
    if (strlen($senha) < 6) {
        die("Erro: A senha deve ter pelo menos 6 caracteres.");
    }

    // criptografa a senha (a parte mais importante para a segurança)
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // insere no banco de dados usando Prepared Statements
    try {
        // prepara a query para evitar SQL Injection
        $sql = "INSERT INTO Usuario (nome, email, senha, telefone, papel) VALUES (:nome, :email, :senha, :telefone, 'cliente')";
        $stmt = $pdo->prepare($sql);
        
        // executa a query com todos os valores
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha_hash,
            ':telefone' => $telefone // Adiciona o telefone
        ]);

        // redireciona para a página de login com uma mensagem de sucesso
        // Usando caminho relativo para mais portabilidade
        header("Location: ../views/auth/login.php?status=registered");
        exit();

    } catch (PDOException $e) {
        // código 23000 é erro de duplicidade 
        if ($e->getCode() == 23000) {
            die("Erro: Este endereço de e-mail já está cadastrado. <a href='../views/auth/login.php'>Faça login</a>.");
        }
        // para outros erros de banco
        die("Erro ao registrar o usuário. Por favor, tente novamente. Detalhe técnico: " . $e->getMessage());
    }
} else {
    // se alguém tentar acessar o script diretamente sem enviar dados
    header("Location: ../views/auth/cadastro_usuario.php");
    exit();
}