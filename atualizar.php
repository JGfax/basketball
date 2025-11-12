<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $pontos = $_POST['pontos'];
    $assistencias = $_POST['assistencias'];
    $rebotes = $_POST['rebotes'];

    $sql = "UPDATE atletas SET nome = ?, pontos = ?, assistencias = ?, rebotes = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $pontos, $assistencias, $rebotes, $id])) {
        echo "Atleta atualizado com sucesso!";
        header('Location: listar.php');
    } else {
        echo "Erro ao atualizar atleta.";
    }
} else {
    echo "Dados não recebidos corretamente.";
}
?>

.