```php
<?php

function validarSenha($senha) {

    $erros = [];

    // 1. Verifica o tamanho
    if (strlen($senha) < 8) {
        $erros[] = "A senha deve ter pelo menos 8 caracteres.";
    }

    // 2. Verifica letra maiúscula
    if (!preg_match('/[A-Z]/', $senha)) {
        $erros[] = "A senha deve ter pelo menos uma letra maiúscula.";
    }

    // 3. Verifica letra minúscula
    if (!preg_match('/[a-z]/', $senha)) {
        $erros[] = "A senha deve ter pelo menos uma letra minúscula.";
    }

    // 4. Verifica número
    if (!preg_match('/[0-9]/', $senha)) {
        $erros[] = "A senha deve ter pelo menos um número.";
    }

    // 5. Verifica caractere especial
    if (!preg_match('/[^a-zA-Z0-9]/', $senha)) {
        $erros[] = "A senha deve ter pelo menos um caractere especial.";
    }

    return $erros;
}


// Verifica se o usuário enviou uma senha
if (isset($_POST["senha"])) {

    $senha = $_POST["senha"];

    $erros = validarSenha($senha);

    echo "<h1>Resultado</h1>";

    if (empty($erros)) {

        echo "<p style='color: green;'>";
        echo "<strong>Senha válida!</strong>";
        echo "</p>";

        echo "<p>A senha atende a todos os requisitos.</p>";

    } else {

        echo "<p style='color: red;'>";
        echo "<strong>Senha inválida!</strong>";
        echo "</p>";

        echo "<ul>";

        foreach ($erros as $erro) {
            echo "<li>" . $erro . "</li>";
        }

        echo "</ul>";
    }

    echo "<br>";
    echo "<a href='index.php'>Testar outra senha</a>";

} else {

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Validador de Senhas</title>

</head>

<body>

    <h1>Validador de Senhas</h1>

    <p>Digite uma senha para verificar se ela é segura:</p>

    <form method="POST">

        <input
            type="password"
            name="senha"
            placeholder="Digite sua senha"
```