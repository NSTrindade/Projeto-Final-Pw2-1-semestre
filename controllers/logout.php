<?php
session_start(); // inicia a sessão para poder destruí-la

// remove todas as variáveis da sessão
session_unset();

// destrói a sessão
session_destroy();

// redireciona o usuário para a página de login
header("Location: ../views/auth/login.php?status=logout");
exit();