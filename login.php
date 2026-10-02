<?php

require_once "conexao.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recebe os dados do formulário
$usuario = trim($_POST["usuario"] ?? "");
$senha = $_POST["senha"] ?? "";

// Verifica se os campos estão vazios
if ($usuario === "" || $senha === "") {
    echo "<h2>Preencha todos os campos!</h2>";
    echo '<a href="index.php">Voltar</a>';
    exit;
}

// Consulta o usuário no banco
$sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "s", $usuario);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$dados = mysqli_fetch_assoc($resultado);

// Verifica o usuário e a senha
if ($dados && password_verify($senha, $dados["senha"])) {

    header("Location: painel.php");
    exit;

} else {

    echo "<h2>Usuário ou senha inválidos!</h2>";
    echo '<a href="index.php">Tentar novamente</a>';

}

?>