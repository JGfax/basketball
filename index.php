<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">

</head>
<body> 

  <!-- Formulário de login -->

  <h2>Formulário</h2>
  <form action="enviar.php" method="POST">


    <label>Equipe:</label><br>
    <input type="text" name="equipe" required><br>

    <label>Jogador:</label><br>
    <input type="text" name="jogador" required><br>

    <label>Pontos por partida:</label><br>
    <input type="number" name="pontos" required><br>

     <label>Assistência por partida:</label><br>
    <input type="number" name="assistencia" required><br>

     <label>Rebotes por partida:</label><br>
    <input type="number" name="rebotes" required><br>
    <button type="submit">Cadastrar</button>

  </form>




</body>
</html>
