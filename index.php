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
  
<!-- LOGO -->

          <div class="logo">BASKET<span>BALL</span></div>
  
<!-- MENU HAMBURGUER-->

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