<?php
$conn = new mysqli("localhost", "root", "", "practica_sqli");
 
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$resultado = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id, usuario, password FROM usuarios WHERE id = $id";
    $resultado = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
  <h1>SQL Injection - UNION Based</h1>
</header>

<div class="container">

  <form method="GET">
    <input type="text" name="id" placeholder="ID de usuario...">
    <button type="submit">Buscar</button>
  </form>

  <?php if ($resultado): ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Usuario</th>
      <th>Password</th>
    </tr>
    <?php while($fila = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?php echo $fila["id"]; ?></td>
      <td><?php echo $fila["usuario"]; ?></td>
      <td><?php echo $fila["password"]; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <?php endif; ?>

</div>

<a href="index.php" class="back-btn">⬅ Volver al inicio</a>

</body>
</html>