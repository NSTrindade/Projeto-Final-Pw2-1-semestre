<?php
require_once '../includes/auth_functions.php';
requireAdmin(); // Verifica se o usuário é administrador

// inclui a parte de conexao ao banco de dados
require_once '../includes/db_connection.php';

// Aceita tanto POST quanto GET
$id = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
} else {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
}

if (!$id) {
    header("Location: ../views/produtos/home.php?error=invalid_id");
    exit();
}

try {
    // busca o nome do arquivo da imagem no banco
    $stmt = $pdo->prepare("SELECT imagem FROM Produto WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch();

    // deleta o produto do banco de dados
    $stmt = $pdo->prepare("DELETE FROM Produto WHERE id = :id");
    $stmt->execute([':id' => $id]);

    // se o produto tinha uma imagem, deleta o arquivo do servidor
    if ($produto && !empty($produto['imagem'])) {
        $caminho_arquivo = '../../uploads/' . $produto['imagem'];
        if (file_exists($caminho_arquivo)) {
            unlink($caminho_arquivo); // a função unlink() deleta um arquivo
        }
    }
    
    header("Location: ../views/produtos/home.php?status=deleted");
    exit();

} catch (PDOException $e) {
    header("Location: ../views/produtos/home.php?error=delete_failed");
    exit();
}