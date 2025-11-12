<?php
include 'conexao.php'; // Inclui a conexão

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Certifica-se de que é um número inteiro

    // Excluir o usuário do banco de dados
    $sql = "DELETE FROM atletas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso! <a href='listar.php'>Voltar</a>";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }
} else {
    echo "ID não informado.";
}

// Fecha a conexão
$conn->close();
?>
