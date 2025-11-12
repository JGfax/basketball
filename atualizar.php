<?php
include 'conexao.php'; // Inclui a conexão

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Atualiza os dados do cliente no banco
    $sql = "UPDATE usuario SET nome = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $email, $id);

    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
        header('Location: listar.php'); // Redireciona para a lista de usuários
    } else {
        echo "Erro ao atualizar os dados: " . $stmt->error;
    }
} else {
    echo "Dados não recebidos corretamente.";
}

// Fecha a conexão
$conn->close();
?>
