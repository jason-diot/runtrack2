<!DOCTYPE html>
<html>
<head>
  <title>Résultat</title>
</head>
<body>

    <form method="get" action="">
        <input type="text" id="nombre" name="nombre"><br>
        <input type="submit" value="Valider">
    </form>

  <?php
    if (isset($_GET['nombre'])) {
      $nombre = $_GET['nombre'];

      if (is_numeric($nombre)) {
        if ($nombre % 2 == 0) {
          echo "Nombre pair";
        } else {
          echo "Nombre impair";
        }
      } else {
        echo "Veuillez entrer un nombre valide.";
      }
    }
  ?>
</body>
</html>
