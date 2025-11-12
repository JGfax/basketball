<?php
include 'conexao.php'; // Inclui a conexão

// Captura os dados enviados pelo formulário
$nome = $_POST['nome'];
$senha = $_POST['senha']; // A senha deve ser tratada antes de ser salva
$email = $_POST['email'];

// Usa password_hash para garantir que a senha seja segura
$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

// Monta e executa o INSERT com prepared statements para evitar SQL Injection
$sql = "INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $senhaHash, $email);

if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
    header('Location: listar.php'); // Redireciona para a lista de usuários
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$conn->close();
?>
