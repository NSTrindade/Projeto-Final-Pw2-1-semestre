<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // coleta e sanitiza os dados do formulário
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $assunto = strip_tags(trim($_POST["assunto"]));
    $mensagem = trim($_POST["mensagem"]);

    // validação simples
    if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($assunto) || empty($mensagem)) {
        // redireciona de volta com um erro se algum campo estiver inválido
        header("Location: /Projeto-Final-Pw2-1-semestre-main/views/site/contato.php?status=error");
        exit;
    }

    // configurações do email
    $destinatario = "velosompedro@gmail.com.br"; 
    $titulo_email = "Nova mensagem do site UrbanStyle: $assunto";

    // monta o corpo do email
    $corpo_email = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n";
    $corpo_email .= "Nome: $nome\n";
    $corpo_email .= "E-mail: $email\n\n";
    $corpo_email .= "Mensagem:\n$mensagem\n";

    // monta os cabeçalhos do email
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // envia o email
    if (mail($destinatario, $titulo_email, $corpo_email, $headers)) {
        // se o e-mail foi enviado com sucesso
        header("Location: /Projeto-Final-Pw2-1-semestre-main/views/site/contato.php?status=success");
    } else {
        // se houve uma falha no envio
        header("Location: /Projeto-Final-Pw2-1-semestre-main/views/site/contato.php?status=fail");
    }
    exit;

} else {
    // se alguém tentar acessar o arquivo diretamente
    header("Location: /Projeto-Final-Pw2-1-semestre-main/views/site/contato.php");
    exit;
}
?>