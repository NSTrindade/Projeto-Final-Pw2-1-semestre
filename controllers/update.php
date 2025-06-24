<?php


// inclui a parte de conexao ao banco de dados
require_once '../includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // pega e validar os dados do formulário de edição
    $id = filter_input(INPUT_POST, 'id_produto', FILTER_VALIDATE_INT);
    $nome = trim($_POST['nome_produto']);
    $preco = filter_input(INPUT_POST, 'preco_produto', FILTER_VALIDATE_FLOAT);

    if (!$id || empty($nome) || $preco === false) {
        die("Dados inválidos.");
    }

    try {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nome'  => $nome,
            ':preco' => $preco,
            ':id'    => $id // vincula o ID do produto
        ]);
        
        header("Location: ../views/produtos/edit.php?id=$id&status=updated");
        exit();

    } catch (PDOException $e) {
        die("Erro ao atualizar o produto: " . $e->getMessage());
    }
}