<?php
function calcule($nombre1, $operateur, $nombre2) {
    switch ($operateur) {
        case '+':
            return $nombre1 + $nombre2;
        case '-':
            return $nombre1 - $nombre2;
        case '*':
            return $nombre1 * $nombre2;
        case '/':
            return $nombre1 / $nombre2;
        case '%':
            return $nombre1 % $nombre2;
        default:
            return "Opérateur invalide";
    }
}
$resultat = calcule(10, '*', 9);
echo $resultat; 
?>