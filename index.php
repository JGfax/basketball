<?php
include 'conexao.php';

// Busca os serviços do banco
$sql = "SELECT id_equipe, nome FROM equipes ORDER BY nome";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">

</head>
<body> 

<header>
  

  
<!-- MENU HAMBURGUER-->

          <nav class="menu">
                    <ul>
                        <li><a href="listar.php">Lista de Atletas &nbsp |</a></li>
                    </ul>
              </nav>


</header>



  <!-- Formulário de login -->

  <h2>Formulário</h2>
  <form action="enviar.php" method="POST">


    <label>Equipe:</label><br>
    <select id="equipe" name="equipe" required> 
       <?php while ($row = $result->fetch_assoc()): ?>                   <!-- Loop para preencher as opções do select -->
                    <option value="<?= $row['id_equipe'] ?>">           <!-- apresentar o valor da option -->
                        <?= htmlspecialchars($row['nome']) ?>    <!-- Exibição do texto na option, de forma automatizada -->
                    </option>
                  <?php endwhile; ?>
    </select> <br>

    
    <label>Jogador:</label><br>
    <input type="text" id="nome" name="nome" required><br>

    <label>Pontos por partida:</label><br>
    <input type="number" name="pontos" required><br>

     <label>Assistência por partida:</label><br>
    <input type="number" name="assistencias" required><br>

     <label>Rebotes por partida:</label><br>
    <input type="number" name="rebotes" required><br>


    <button type="submit">Cadastrar</button>
  </form>




</body>
</html>

.