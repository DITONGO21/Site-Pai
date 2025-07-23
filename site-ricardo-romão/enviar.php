<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["mensagem"]);

    $destinatario = "romao_4@msn.com";
    $assunto = "Nova mensagem do site";

    $conteudo = "Nome: $nome\n";
    $conteudo .= "Email: $email\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    $cabecalhos = "From: $nome <$email>";

    if (mail($destinatario, $assunto, $conteudo, $cabecalhos)) {
        echo "Mensagem enviada com sucesso.";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente.";
    }
} else {
    http_response_code(403);
    echo "Método não permitido.";
}
?>
