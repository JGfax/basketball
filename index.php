<?php
include 'conexao.php';

// Busca os serviços do banco
$sql = "SELECT id_servico, nome_servico FROM servicos ORDER BY nome_servico";
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
  
<!-- LOGO -->

          <div class="logo">BASKET<span>BALL</span></div>
  
<!-- MENU HAMBURGUE-->

          <nav class="menu">
                <div class="hamburger" onclick="toggleMenu()">☰</div>
                    <ul>
                        <li><a href="index.html">Home &nbsp |</a></li>
                        <li><a href="servicos.html">Serviços &nbsp |</a></li>
                        <li><a href="contato.html">Contato</a></li>
                    </ul>
              </nav>

<!-- MENU MOBILE-->

            <div class="mobile-menu" id="mobileMenu">
              <a href="#">Home</a>
              <a href="#">Sobre</a>
              <a href="#">Serviços</a>
              <a href="#">Contato</a>
            </div>
</header>

        <script>
            const menu = document.getElementById("mobileMenu");

                function toggleMenu() {
                menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
                }

                window.addEventListener("resize", () => {
                    if (window.innerWidth > 768) {
                        menu.style.display = "none";
                    }
                }
                );
        </script>


  <!-- Formulário de login -->

  <h2>Formulário</h2>
  <form action="enviar.php" method="POST">


    <label>Equipe:</label><br>
    <select id="equipe" name="equipe" required> 
       <?php while ($row = $result->fetch_assoc()): ?>                   <!-- Loop para preencher as opções do select -->
                    <option value="<?= $row['id_servico'] ?>">           <!-- apresentar o valor da option -->
                        <?= htmlspecialchars($row['nome_servico']) ?>    <!-- Exibição do texto na option, de forma automatizada -->
                    </option>
                  <?php endwhile; ?>
    </select>

    
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
