<?php
include 'conexao.php'; // Inclui a conexão

// Captura os dados enviados pelo formulário
$nome = $_POST['nome'] ?? null;
$pontos = $_POST['pontos'] ?? null;
$assistencias = $_POST['assistencias'] ?? null;
$rebotes = $_POST['rebotes'] ?? null;


if ($nome && $pontos !== null && $assistencias !== null && $rebotes !== null) {
    $sql = "INSERT INTO atletas (nome, pontos, assistencias, rebotes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $nome, $pontos, $assistencias, $rebotes);


    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
        // header('Location: listar.php'); // Redireciona para a lista de usuários
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Todos os campos são obrigatórios.";
}

$conn->close();

?>