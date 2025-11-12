<?php
include 'conexao.php'; // Inclui a conexão

// Consulta para obter todos os atletas com os nomes das equipes
$sql = "SELECT atletas.id, atletas.id_equipe, atletas.nome, atletas.pontos, atletas.assistencias, atletas.rebotes, equipes.nome AS nome_equipe 
        FROM atletas 
        LEFT JOIN equipes ON atletas.id_equipe = equipes.id_equipe";
$result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Atletas</title>
  <link rel="stylesheet" href="listar.css">
</head>
<body>

  
<!-- MENU HAMBURGUER-->
<header>
  <nav class="menu">
    <ul>
      <li><a href="index.php">Cadastro de atletas &nbsp |</a></li>
    </ul>
  </nav>
</header>
<br><br>
  <h2>Atletas cadastrados</h2>

  <table border="1" cellpadding="8">
    <tr>
      <th>ID Atleta</th>
      <th>ID Equipe</th>
      <th>Equipe</th>
      <th>Nome</th>
      <th>Pontuação</th>
      <th>Assistências</th>
      <th>Rebotes</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['id_equipe'] ?></td>
        <td><?= htmlspecialchars($row['nome_equipe']) ?></td>
        <td><?= htmlspecialchars($row['nome']) ?></td>
        <td><?= htmlspecialchars($row['pontos']) ?></td>
        <td><?= htmlspecialchars($row['assistencias']) ?></td>
        <td><?= htmlspecialchars($row['rebotes']) ?></td>
        <td>
          <!-- Link para editar -->
          <a href="editar.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja editar')">Editar</a>
          </td>
        <td>
          <!-- Link para excluir -->
          <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
```
        