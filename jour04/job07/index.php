<!DOCTYPE html>
<html>
<head>
  <title>maison</title>
</head>
<body>
  <h2>Construction de maison</h2>
  <form method="GET" action="">
    
    <label for="hauteur">Hauteur :</label>
    <input type="text" id="hauteur" name="hauteur" required><br><br>
    
    <label for="largeur">Largeur :</label>
    <input type="text" id="largeur" name="largeur" required><br><br>

    <input type="submit" value="Construire">
  </form>

  <?php
  if (isset($_GET['largeur']) && isset($_GET['hauteur'])) {
      $largeur = $_GET['largeur'];
      $hauteur = $_GET['hauteur'];

      // Construction de la maison
      $toit = "";
      $murs = "";
      $base = "";

      // Construction du toit
      for ($i = 0; $i < $hauteur; $i++) {
          $toit .= str_repeat(" ", $hauteur - $i - 1) . "/" . str_repeat("_", $i * 2) . "\\" . "\n";
      }

      // Construction des murs
      for ($i = 0; $i < $hauteur; $i++) {
          $murs .= "|" . str_repeat(" ", $largeur - 2) . "|" . "\n";
      }

      // Construction de la base
      $base = "|" . str_repeat("_", $largeur - 2) . "|";

      // Affichage de la maison
      echo "<pre>";
      echo $toit;
      echo $murs;
      echo $base;
      echo "</pre>";
  }
  ?>
</body>
</html>