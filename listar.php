<?php
include 'conexao.php'; // Inclui a conexão

$result = $conn->query("SELECT * FROM usuario");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
</head>
<body>
  <h2>Usuários cadastrados</h2>

  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nome']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
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
