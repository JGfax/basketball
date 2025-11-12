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
        $atleta = $result->fetch_assoc();
    } else {
        echo "Atleta não encontrado.";
        exit;
    }
} else {
    echo "ID não informado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Atleta</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<header>
  <nav class="menu">
    <ul>
      <li><a href="listar.php">Voltar para a Lista</a></li>
    </ul>
  </nav>
</header>
<br><br>

<h2>Editar Atleta</h2>

<!-- Formulário de edição -->
<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $atleta['id'] ?>" />
    
    <label>Jogador:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($atleta['nome']) ?>" required><br><br>

    <label>Pontuação:</label><br>
    <input type="number" name="pontos" value="<?= htmlspecialchars($atleta['pontos']) ?>" required><br><br>

    <label>Assistência:</label><br>
    <input type="number" name="assistencias" value="<?= htmlspecialchars($atleta['assistencias']) ?>" required><br><br>

    <label>Rebotes:</label><br>
    <input type="number" name="rebotes" value="<?= htmlspecialchars($atleta['rebotes']) ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>