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
  <h1>XSS Almacenado</h1>
</header>

<div class="container">

  <form method="POST">
    <input type="text" name="comentario" placeholder="Comentario">
    <button type="submit">Guardar</button>
  </form>

  <?php
    $file = "comentarios.txt";

    if (isset($_POST['comentario'])) {
        file_put_contents($file, $_POST['comentario'] . "\n", FILE_APPEND);
    }

    if (file_exists($file)) {
        $comentarios = file($file);
        foreach ($comentarios as $c) {
            echo "<div class='comment'>$c</div>";
        }
    }
  ?>

</div>


<a href="index.php" class="back-btn">⬅ Volver al inicio</a>

</body>
</html>