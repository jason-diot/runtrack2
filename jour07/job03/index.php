<?php
session_start();

// Vérifier si le formulaire a été soumis
if (isset($_POST['prenom'])) {
    // Récupérer le prénom saisi dans le formulaire
    $prenom = $_POST['prenom'];

    // Vérifier si la variable de session "prenoms" existe
    if (!isset($_SESSION['prenoms'])) {
        // Si elle n'existe pas, l'initialiser comme un tableau vide
        $_SESSION['prenoms'] = array();
    }

    // Ajouter le prénom à la liste des prénoms dans la variable de session
    $_SESSION['prenoms'][] = $prenom;
}

// Afficher l'ensemble des prénoms dans la variable de session
if (isset($_SESSION['prenoms']) && !empty($_SESSION['prenoms'])) {
    echo "Liste des prénoms : <br>";
    foreach ($_SESSION['prenoms'] as $prenom) {
        echo $prenom . "<br>";
    }
}

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la liste des prénoms en supprimant la variable de session
    unset($_SESSION['prenoms']);
}

?>

<!-- Formulaire de saisie du prénom -->
<form method="post">
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom">
    <input type="submit" value="Ajouter">
</form>

<!-- Bouton "reset" -->
<form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
</form>
