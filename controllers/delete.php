<?php

// inclui a parte de conexao ao banco de dados
require_once '../includes/db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if (!$id) die("ID inválido.");

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
        
        header("Location: ../views/admin/dashboard.php?status=deleted");
        exit();

    } catch (PDOException $e) {
        die("Erro ao deletar o produto: " . $e->getMessage());
    }
}