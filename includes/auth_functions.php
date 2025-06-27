<?php
session_start();

/**
 * Verifica se o usuário está logado
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && $_SESSION['is_logged_in'] === true;
}

/**
 * Verifica se o usuário é administrador
 */
function isAdmin() {
    return isLoggedIn() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'administrador';
}

/**
 * Verifica se o usuário é cliente
 */
function isCliente() {
    return isLoggedIn() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'cliente';
}

/**
 * Redireciona para login se não estiver logado
 */
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: /Projeto-Final-Pw2-1-semestre-main/views/auth/login.php?error=login_required");
        exit();
    }
}

/**
 * Redireciona para login se não for administrador
 */
function requireAdmin() {
    if (!isAdmin()) {
        header("Location: /Projeto-Final-Pw2-1-semestre-main/views/auth/login.php?error=admin_required");
        exit();
    }
}

/**
 * Obtém informações do usuário logado
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null,
        'nome' => isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Usuário',
        'email' => isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '',
        'papel' => isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'cliente'
    ];
}

/**
 * Gera hash da senha
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Verifica se a senha está correta
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}
?> 