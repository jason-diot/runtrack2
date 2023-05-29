<!DOCTYPE html>
<html>
<head>
  <title>Formulaire</title>
  <?php
  $selectedStyle = isset($_POST['style']) ? $_POST['style'] : 'style1';
  echo "<link id='style-link' rel='stylesheet' type='text/css' href='{$selectedStyle}.css'>";
  ?>
</head>
<body>
  <h1>Sélectionnez un style</h1>
  <form method="POST" action="">
    <label for="style">Style :</label>
    <select id="style" name="style">
      <option value="style1">Style 1</option>
      <option value="style2">Style 2</option>
      <option value="style3">Style 3</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Appliquer le style">
  </form>
</body>
</html>
