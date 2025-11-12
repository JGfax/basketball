<?php
$host = 'localhost';     // Servidor
$usuario = 'root';       // Usuário padrão do XAMPP
$senha = 'Home@spSENAI2025!';
$banco = 'biblioteca';    // Nome do banco

// Cria conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se ocorreu erro
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Caso queira exibir confirmação (teste)
echo "Conectado com sucesso!";
?>

