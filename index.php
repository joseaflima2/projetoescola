<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario'])) {
    header("Location: painel.php"); // Redireciona para a página restrita
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Credenciais fixas (apenas para exemplo)
    $usuario_correto = "";
    $senha_correta = "";

    // Verifica as credenciais
    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        // Autenticação bem-sucedida
        $_SESSION['usuario'] = $usuario; // Armazena o usuário na sessão
        header("Location: painel.php"); // Redireciona para a página restrita
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
