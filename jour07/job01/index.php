<?php
session_start();

// Vérifier si la variable de session "nbvisites" existe
if (!isset($_SESSION['nbvisites'])) {
    // Si elle n'existe pas, l'initialiser à 0
    $_SESSION['nbvisites'] = 0;
}

// Incrémenter le compteur de visites
$_SESSION['nbvisites']++;

// Afficher le contenu de la variable de session
echo "Nombre de visites : " . $_SESSION['nbvisites'];

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser le compteur de visites
    $_SESSION['nbvisites'] = 0;
}

?>

<form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
</form>
