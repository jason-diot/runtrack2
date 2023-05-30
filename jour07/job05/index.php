<?php
session_start();

// Vérifier si la grille du morpion est initialisée en tant que variable de session
if (!isset($_SESSION['morpion'])) {
    // Initialiser la grille du morpion
    $_SESSION['morpion'] = array(
        array('-', '-', '-'),
        array('-', '-', '-'),
        array('-', '-', '-')
    );
}

// Vérifier si le bouton "Réinitialiser la partie" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la grille du morpion
    $_SESSION['morpion'] = array(
        array('-', '-', '-'),
        array('-', '-', '-'),
        array('-', '-', '-')
    );
}

// Vérifier si un bouton de la grille a été cliqué
if (isset($_POST['cell'])) {
    $cell = $_POST['cell'];
    $row = $cell[0];
    $col = $cell[1];

    // Vérifier si la case est vide
    if ($_SESSION['morpion'][$row][$col] == '-') {
        // Déterminer le joueur actuel (X ou O)
        $joueur = $_SESSION['joueur'] ?? 'X';

        // Mettre le symbole du joueur dans la case correspondante
        $_SESSION['morpion'][$row][$col] = $joueur;

        // Changer de joueur pour le prochain coup
        $_SESSION['joueur'] = ($joueur == 'X') ? 'O' : 'X';
    }
}

// Vérifier si un joueur a gagné
function checkGagnant($symbole) {
    $morpion = $_SESSION['morpion'];

    // Vérifier les lignes
    for ($i = 0; $i < 3; $i++) {
        if ($morpion[$i][0] == $symbole && $morpion[$i][1] == $symbole && $morpion[$i][2] == $symbole) {
            return true;
        }
    }

    // Vérifier les colonnes
    for ($i = 0; $i < 3; $i++) {
        if ($morpion[0][$i] == $symbole && $morpion[1][$i] == $symbole && $morpion[2][$i] == $symbole) {
            return true;
        }
    }

    // Vérifier les diagonales
    if ($morpion[0][0] == $symbole && $morpion[1][1] == $symbole && $morpion[2][2] == $symbole) {
        return true;
    }
    if ($morpion[0][2] == $symbole && $morpion[1][1] == $symbole && $morpion[2][0] == $symbole) {
        return true;
    }

    return false;
}

// Vérifier si toutes les cases ont été cliquées et qu'il n'y a pas de gagnant
function matchNul() {
    $morpion = $_SESSION['morpion'];

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($morpion[$i][$j] == '-') {
                return false;
            }
        }
    }

    return true;
}
// Vérifier si un joueur a gagné
if (checkGagnant('X')) {
    $gagnant = 'X';
    // Réinitialiser la grille du morpion
    $_SESSION['morpion'] = array(
        array('-', '-', '-'),
        array('-', '-', '-'),
        array('-', '-', '-')
    );
    unset($_SESSION['joueur']);
} elseif (checkGagnant('O')) {
    $gagnant = 'O';
    // Réinitialiser la grille du morpion
    $_SESSION['morpion'] = array(
        array('-', '-', '-'),
        array('-', '-', '-'),
        array('-', '-', '-')
    );
    unset($_SESSION['joueur']);
} elseif (matchNul()) {
    $gagnant = 'Match nul';
    // Réinitialiser la grille du morpion
    $_SESSION['morpion'] = array(
        array('-', '-', '-'),
        array('-', '-', '-'),
        array('-', '-', '-')
    );
    unset($_SESSION['joueur']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu du Morpion</title>
</head>
<body>

<h1>Jeu du Morpion</h1>

<!-- Afficher la grille du morpion -->
<table>
    <?php for ($i = 0; $i < 3; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 3; $j++) { ?>
                <td>
                    <form method="post">
                        <?php if ($_SESSION['morpion'][$i][$j] == '-') { ?>
                            <input type="submit" name="cell" value="-">
                        <?php } else { ?>
                            <input type="submit" value="<?php echo $_SESSION['morpion'][$i][$j]; ?>" disabled>
                        <?php } ?>
                        <input type="hidden" name="cell" value="<?php echo $i . $j; ?>">
                    </form>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>

<br>

<!-- Afficher le message de victoire ou de match nul -->
<?php if (isset($gagnant)) { ?>
    <p><?php echo $gagnant; ?></p>
<?php } ?>

<!-- Bouton "Réinitialiser la partie" -->
<form method="post">
    <input type="submit" name="reset" value="Réinitialiser la partie">
</form>

</body>
</html>

