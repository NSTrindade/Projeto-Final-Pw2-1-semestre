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
        // Busca o usuário no banco de dados incluindo o papel
        $sql = "SELECT id, nome, email, senha, papel FROM Usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        // 3. Verifica se o usuário foi encontrado E se a senha digitada corresponde à senha criptografada no banco
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Sucesso! A senha está correta.
            
            // Guarda as informações do usuário na sessão incluindo o papel
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];
            $_SESSION['user_email'] = $usuario['email'];
            $_SESSION['user_role'] = $usuario['papel'];
            $_SESSION['is_logged_in'] = true;
            
            // Redireciona baseado no papel do usuário
            if ($usuario['papel'] === 'administrador') {
                header("Location: ../views/admin/dashboard.php");
            } else {
                header("Location: ../views/produtos/home.php");
            }
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