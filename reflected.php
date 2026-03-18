<?php
session_start();
setcookie("session_id", "abc123", time() + 3600);
setcookie("user", "alvaro", time() + 3600);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
  <h1>XSS Reflejado</h1>
</header>

<div class="container">

  <form method="GET">
    <input type="text" name="q" placeholder="Buscar...">
    <button type="submit">Enviar</button>
  </form>

  <?php
    if (isset($_GET['q'])) {
        echo "<div class='result'>Resultado: " . $_GET['q'] . "</div>";
    }
  ?>

</div>


<a href="index.php" class="back-btn">⬅ Volver al inicio</a>

</body>
</html>