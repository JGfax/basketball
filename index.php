<?php
include 'conexao.php';

// Busca os serviços do banco
$sql = "SELECT id_equipe, nome FROM equipes ORDER BY nome";
$result = $conn->query($sql);

$equipes = [];
while ($row = $result->fetch_assoc()) {
    $equipes[] = $row;
}

$logo_map = [
    'Golden State Warriors' => 'image/golden_state.webp',
    'Los Angeles Lakers' => 'image/lakers.webp',
    'LA Clippers' => 'image/clippers.webp',
    'Phoenix Suns' => 'image/phoenix.webp',
    'Sacramento Kings' => 'image/sacramento.webp'
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">
  <style>
    .custom-select-wrapper {
      position: relative;
      display: inline-block;
      width: 100%;
      max-width: 300px;
    }
    .custom-select {
      position: relative;
      cursor: pointer;
      border: 1px solid #ccc;
      padding: 8px 12px;
      background-color: #fff;
    }
    .custom-select-trigger {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .custom-options {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      border: 1px solid #ccc;
      background-color: #fff;
      z-index: 10;
      max-height: 200px;
      overflow-y: auto;
    }
    .custom-option {
      display: flex;
      align-items: center;
      padding: 8px 12px;
      cursor: pointer;
    }
    .custom-option:hover {
      background-color: #f0f0f0;
    }
    .custom-option img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }
    .custom-select.open .custom-options {
      display: block;
    }
  </style>
</head>
<body> 

<header>
  <nav class="menu">
    <ul>
      <li><a href="listar.php">Lista de Atletas &nbsp |</a></li>
    </ul>
  </nav>
</header>

<h2>Formulário</h2>
<form action="enviar.php" method="POST">

  <label>Equipe:</label><br>
  <div class="custom-select-wrapper">
    <div class="custom-select">
      <div class="custom-select-trigger">
        <span>Selecione uma equipe</span>
        <div class="arrow"></div>
      </div>
      <div class="custom-options">
        <?php foreach ($equipes as $equipe): ?>
          <?php
            $nome_equipe = htmlspecialchars($equipe['nome']);
            $logo_path = isset($logo_map[$nome_equipe]) ? $logo_map[$nome_equipe] : '';
          ?>
          <?php if ($logo_path): ?>
            <div class="custom-option" data-value="<?= $equipe['id_equipe'] ?>">
              <img src="<?= $logo_path ?>" alt="<?= $nome_equipe ?>">
              <span><?= $nome_equipe ?></span>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <input type="hidden" id="equipe" name="equipe" required>
  <br>

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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.custom-select-wrapper');
    const select = wrapper.querySelector('.custom-select');
    const trigger = select.querySelector('.custom-select-trigger span');
    const options = select.querySelectorAll('.custom-option');
    const hiddenInput = document.getElementById('equipe');

    select.addEventListener('click', function () {
        this.classList.toggle('open');
    });

    options.forEach(option => {
        option.addEventListener('click', function () {
            trigger.textContent = this.querySelector('span').textContent;
            hiddenInput.value = this.dataset.value;
            select.classList.remove('open');
        });
    });

    window.addEventListener('click', function (e) {
        if (!select.contains(e.target)) {
            select.classList.remove('open');
        }
    });
});
</script>

</body>
</html>