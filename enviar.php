<?php
include 'conexao.php';

$id_equipe = $_POST['equipe'] ?? null;
$nome = $_POST['nome'] ?? null;
$pontos = $_POST['pontos'] ?? null;
$assistencias = $_POST['assistencias'] ?? null;
$rebotes = $_POST['rebotes'] ?? null;

if ($id_equipe && $nome && $pontos !== null && $assistencias !== null && $rebotes !== null) {
    // Use $conn from conexao.php, assuming it's a mysqli object
    $sql = "INSERT INTO atletas (id_equipe, nome, pontos, assistencias, rebotes) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters: i for integer, s for string
    $stmt->bind_param("isiii", $id_equipe, $nome, $pontos, $assistencias, $rebotes);

    if ($stmt->execute()) {
        // Redirect to the listing page on success
        header('Location: listar.php');
        exit(); // It's a good practice to call exit after a redirect
    } else {
        echo "Erro ao cadastrar atleta: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Todos os campos são obrigatórios.";
}

$conn->close();
?>