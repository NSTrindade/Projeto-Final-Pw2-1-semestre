<?php

// inclui a parte de conexao ao banco de dados
require_once '../includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // pega os dados do formulário
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    // substitui vírgula por ponto para o formato DECIMAL do MySQL
    $preco = str_replace(',', '.', $_POST['preco']); 
    $preco = filter_var($preco, FILTER_VALIDATE_FLOAT);

    $caminho_imagem = null; // valor padrão se nenhuma imagem for enviada

    // processa o upload da imagem
    // verifica se um arquivo foi enviado e se não houve erro
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        
        $upload_dir = '../../uploads/'; // Caminho para a pasta de uploads
        
        // gera um nome de arquivo único para evitar sobreposições
        $nome_arquivo = uniqid() . '-' . basename($_FILES['imagem']['name']);
        $caminho_imagem = $upload_dir . $nome_arquivo;

        // validação básica do tipo de arquivo
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['imagem']['type'], $allowed_types)) {
            
            // Move o arquivo do diretório temporário para o diretório final
            if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
                die("Erro ao mover o arquivo de imagem.");
            }

            // salva apenas o nome do arquivo no banco de dados, não o caminho completo
            $caminho_imagem = $nome_arquivo;

        } else {
            die("Tipo de arquivo de imagem não permitido.");
        }
    }

    // valida os dados principais
    if (empty($nome) || $preco === false) {
        die("Nome e Preço são obrigatórios e devem ser válidos.");
    }

    // insere no banco com Prepared Statements
    try {
        $sql = "INSERT INTO Produto (nome, descricao, preco, imagem) VALUES (:nome, :descricao, :preco, :imagem)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nome'      => $nome,
            ':descricao' => $descricao,
            ':preco'     => $preco,
            ':imagem'    => $caminho_imagem // Salva o nome do arquivo ou NULL
        ]);
        
        header("Location: ../views/admin/dashboard.php?status=success");
        exit();

    } catch (PDOException $e) {
        die("Erro ao cadastrar o produto: " . $e->getMessage());
    }
}