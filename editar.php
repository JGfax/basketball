<?php
include 'conexao.php'; // Inclui a conexão

// Verificar se o ID foi passado por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados do usuário
    $sql = "SELECT * FROM atletas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $atletas = $result->fetch_assoc();
    } else {
        echo "Atleta não encontrado.";
        exit;
    }
} else {
    echo "ID não informado.";
    exit;
}
?>

<!-- Formulário de edição -->
<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $atletas['id'] ?>" />
    <label>jogador:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($atletas['nome']) ?>" required><br><br>

    <label>Pontuação:</label><br>
    <input type="number" name="pontos" value="<?= htmlspecialchars($atletas['pontos']) ?>" required><br><br>

    <label>Assistência:</label><br>
    <input type="number" name="assistencias" value="<?= htmlspecialchars($atletas['assistencias']) ?>" required><br><br>

    <label>Rebotes:</label><br>
    <input type="number" name="rebotes" value="<?= htmlspecialchars($atletas['rebotes']) ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>
