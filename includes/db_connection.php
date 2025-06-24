<?php

// credencias do banco de dados

$host = 'localhost';        
$db   = 'ecommerce';  
$user = 'root';     
$pass = '';      
$charset = 'utf8mb4';      

// configuração do dsn
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// opções do pdo
$options = [
    // lança exceções em caso de erro, em vez de apenas avisos
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // define o modo de busca padrão para array associativo 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // desativa a emulação de prepared statements, usando prepared statements nativos do DB
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// tenta conectar ao banco
try {
    // cria a instância do PDO que representa a conexão com o banco
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // se a conexão falhar, exibe uma mensagem de erro genérica e encerra o script.
    // throw new \PDOException($e->getMessage(), (int)$e->getCode()); // Para debug
    die("Erro ao conectar com o banco de dados. Por favor, tente mais tarde.");
}

