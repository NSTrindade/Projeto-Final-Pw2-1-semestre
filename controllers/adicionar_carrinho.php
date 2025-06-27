<?php
require_once '../includes/auth_functions.php';
require_once '../includes/db_connection.php';

// Verificar se o usuário está logado
requireLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = filter_input(INPUT_POST, 'produto_id', FILTER_VALIDATE_INT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
    $usuario_id = $_SESSION['user_id'];

    // Validações
    if (!$produto_id || $quantidade < 1) {
        header("Location: ../views/produtos/home.php?error=invalid_data");
        exit();
    }

    try {
        // Verificar se o produto existe
        $stmt = $pdo->prepare("SELECT id, nome, preco FROM Produto WHERE id = :id");
        $stmt->execute([':id' => $produto_id]);
        $produto = $stmt->fetch();

        if (!$produto) {
            header("Location: ../views/produtos/home.php?error=product_not_found");
            exit();
        }

        // Verificar se o produto já está no carrinho do usuário
        $stmt = $pdo->prepare("SELECT id, quantidade FROM Carrinho WHERE usuario_id = :usuario_id AND produto_id = :produto_id");
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':produto_id' => $produto_id
        ]);
        $item_carrinho = $stmt->fetch();

        if ($item_carrinho) {
            // Atualizar quantidade se já existe no carrinho
            $nova_quantidade = $item_carrinho['quantidade'] + $quantidade;
            $stmt = $pdo->prepare("UPDATE Carrinho SET quantidade = :quantidade WHERE id = :id");
            $stmt->execute([
                ':quantidade' => $nova_quantidade,
                ':id' => $item_carrinho['id']
            ]);
        } else {
            // Adicionar novo item ao carrinho
            $stmt = $pdo->prepare("INSERT INTO Carrinho (usuario_id, produto_id, quantidade) VALUES (:usuario_id, :produto_id, :quantidade)");
            $stmt->execute([
                ':usuario_id' => $usuario_id,
                ':produto_id' => $produto_id,
                ':quantidade' => $quantidade
            ]);
        }

        // Redirecionar com mensagem de sucesso
        header("Location: ../views/produtos/produto.php?id=" . $produto_id . "&status=added_to_cart");
        exit();

    } catch (PDOException $e) {
        header("Location: ../views/produtos/produto.php?id=" . $produto_id . "&error=database_error");
        exit();
    }
} else {
    // Se não for POST, redirecionar
    header("Location: ../views/produtos/home.php");
    exit();
}
?> 