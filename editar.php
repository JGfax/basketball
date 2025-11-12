<?php
include 'conexao.php'; // Inclui a conexão

// Verificar se o ID foi passado por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados do usuário
    $sql = "SELECT * FROM usuario WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID não informado.";
    exit;
}
?>

<!-- Formulário de edição -->
<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>" />
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>
