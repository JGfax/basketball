<?php
include 'conexao.php';

$nome = $_POST['nome'] ?? null;
$pontos = $_POST['pontos'] ?? null;
$assistencias = $_POST['assistencias'] ?? null;
$rebotes = $_POST['rebotes'] ?? null;

if ($nome && $pontos !== null && $assistencias !== null && $rebotes !== null) {
    $sql = "INSERT INTO atletas (nome, pontos, assistencias, rebotes) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nome, $pontos, $assistencias, $rebotes])) {
        echo "Atleta cadastrado com sucesso!";
        header('Location: listar.php');
    } else {
        echo "Erro ao cadastrar atleta.";
    }
} else {
    echo "Todos os campos são obrigatórios.";
}
?>

.