<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">

</head>
<body>
  <h2>Login</h2>
  <form action="enviar.php" method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br><br>

    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
