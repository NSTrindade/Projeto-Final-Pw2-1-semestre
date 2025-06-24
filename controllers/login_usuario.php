<?php
// o session_start() DEVE ser a primeira linha de código para trabalhar com sessões.
session_start();


// inclui a parte de conexão ao banco de dados
require_once '../includes/db_connection.php';

// verifica se o formulário foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // coleta e valida o e-mail
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    // se os campos estiverem vazios ou o e-mail for inválido, redireciona de volta
    if (!$email || empty($senha)) {
        header("Location: ../views/auth/login.php?error=empty_fields");
        exit();
    }

    try {
        // 2. Busca o usuário no banco de dados pelo e-mail (usando Prepared Statement)
        $sql = "SELECT id, nome, email, senha FROM Usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        // 3. Verifica se o usuário foi encontrado E se a senha digitada corresponde à senha criptografada no banco
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Sucesso! A senha está correta.
            
            // 4. Guarda as informações do usuário na sessão para que ele continue logado
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];
            $_SESSION['is_logged_in'] = true;
            
            // redireciona para o painel de administração ou página principal logada
            header("Location: ../views/admin/dashboard.php");
            exit();

        } else {
            // usuário não encontrado ou senha incorreta.
            // redireciona de volta para a página de login com uma mensagem de erro.
            header("Location: ../views/auth/login.php?error=invalid_credentials");
            exit();
        }

    } catch (PDOException $e) {
        // em caso de erro com o banco de dados
        die("Erro de sistema. Por favor, tente novamente mais tarde. Detalhe: " . $e->getMessage());
    }
} else {
    //sSe alguém tentar acessar este arquivo diretamente pela URL
    header("Location: ../views/auth/login.php");
    exit();
}