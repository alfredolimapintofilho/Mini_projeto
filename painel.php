<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Sistema de Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="painel-container">
        <div class="painel-header">
            <h1>🔐 Sistema de Login</h1>
            <span>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?></span>
        </div>

        <div class="painel-content">
            <h2>Bem-vindo ao Sistema!</h2>
            <p>Você está logado com sucesso no sistema.</p>

            <a href="logout.php" class="btn-sair">Sair da conta</a>
        </div>
    </div>
</body>
</html>