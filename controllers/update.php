<?php
require_once '../includes/auth_functions.php';
requireAdmin(); // Verifica se o usuário é administrador

// inclui a parte de conexao ao banco de dados
require_once '../includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // pega e validar os dados do formulário de edição
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);

    if (!$id || empty($nome) || $preco === false) {
        die("Dados inválidos.");
    }

    try {
        $sql = "UPDATE Produto SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nome'      => $nome,
            ':descricao' => $descricao,
            ':preco'     => $preco,
            ':id'        => $id
        ]);
        
        header("Location: ../views/produtos/home.php?status=updated");
        exit();

    } catch (PDOException $e) {
        die("Erro ao atualizar o produto: " . $e->getMessage());
    }
} else {
    header("Location: ../views/produtos/home.php");
    exit();
}