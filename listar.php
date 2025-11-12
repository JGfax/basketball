<?php
include 'conexao.php'; // Inclui a conexão

$result = $conn->query("SELECT * FROM atletas"); // Consulta para obter todos os usuários
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Atletas</title>
</head>
<body>
  <h2>Atletas cadastrados</h2>

  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Pontuação</th>
      <th>Assistências</th>
      <th>Rebotes</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nome']) ?></td>
        <td><?= htmlspecialchars($row['pontos']) ?></td>
        <td><?= htmlspecialchars($row['assistencias']) ?></td>
        <td><?= htmlspecialchars($row['rebotes']) ?></td>
        <td>
          <!-- Link para editar -->
         <a href="editar.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja editar')">Editar</a>
          <!-- Link para excluir -->
          <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
