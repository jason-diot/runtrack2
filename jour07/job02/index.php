<?php
// Vérifier si le cookie "nbvisites" existe
if (isset($_COOKIE['nbvisites'])) {
    // Si le cookie existe, récupérer sa valeur et l'incrémenter
    $nbVisites = $_COOKIE['nbvisites'] + 1;
} else {
    // Si le cookie n'existe pas, initialiser le compteur à 1
    $nbVisites = 1;
}

// Définir le cookie "nbvisites" avec la nouvelle valeur
setcookie('nbvisites', $nbVisites, time() + 3600); // Le cookie expire dans 1 heure

// Afficher le contenu du cookie
echo "Nombre de visites : " . $nbVisites;

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser le compteur de visites en supprimant le cookie
    setcookie('nbvisites', '', time() - 3600);
    $nbVisites = 0;
}

?>

<!-- Afficher le bouton "reset" -->
<form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
</form>
