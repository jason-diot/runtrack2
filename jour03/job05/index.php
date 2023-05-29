<?php
$str = "On n'est pas le meilleur quand on le croit mais quand on le sait.";
$dic = array(
    "consonnes" => 0,
    "voyelles" => 0
);

$vowels = array("a", "e", "i", "o", "u", "y");

// Parcours de la chaîne $str
for ($i = 0; $i < strlen($str); $i++) {
    $char = strtolower($str[$i]);
    if (in_array($char, $vowels)) {
        $dic["voyelles"]++;
    } elseif (ctype_alpha($char)) {
        $dic["consonnes"]++;
    }
}

// Affichage du tableau HTML
echo "<table>";
echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";
echo "<tbody>";
echo "<tr><td>" . $dic["voyelles"] . "</td><td>" . $dic["consonnes"] . "</td></tr>";
echo "</tbody>";
echo "</table>";
?>
