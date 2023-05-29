<?php
// Déclaration des variables de différents types
$booleanVar = true;
$integerVar = 42;
$stringVar = "Hello, world!";
$floatVar = 3.14;

// Création du tableau HTML
echo "<table>";
echo "<thead>";
echo "<tr><th>Type</th><th>Nom</th><th>Valeur</th></tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr><td>boolean</td><td>booleanVar</td><td>$booleanVar</td></tr>";
echo "<tr><td>integer</td><td>integerVar</td><td>$integerVar</td></tr>";
echo "<tr><td>string</td><td>stringVar</td><td>$stringVar</td></tr>";
echo "<tr><td>float</td><td>floatVar</td><td>$floatVar</td></tr>";
echo "</tbody>";
echo "</table>";
?>
