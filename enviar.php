<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["message"]);

    $destinatario = "goncalo.romao24@gmail.com";
    $assunto = "Nova mensagem do site";

    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    $cabecalhos = "From: $nome <$email>";

    if (mail($destinatario, $assunto, $corpo, $cabecalhos)) {
        echo "Mensagem enviada com sucesso.";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
}
?>
