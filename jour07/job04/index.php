<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['connexion'])) {
    // Récupérer le prénom saisi dans le formulaire
    $prenom = $_POST['prenom'];

    // Définir le cookie "prenom" avec le prénom
    setcookie('prenom', $prenom, time() + 3600); // Le cookie expire dans 1 heure
}

// Vérifier si l'utilisateur est déjà connecté en vérifiant l'existence du cookie "prenom"
if (isset($_COOKIE['prenom'])) {
    $prenom = $_COOKIE['prenom'];
    // Afficher le message de bienvenue et le bouton de déconnexion
    echo "Bonjour $prenom !";
    echo '<form method="post">
            <input type="submit" name="deco" value="Déconnexion">
          </form>';
} else {
    // Afficher le formulaire de connexion
    echo '<form method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom">
            <input type="submit" name="connexion" value="Connexion">
          </form>';
}

// Vérifier si le bouton "Déconnexion" a été cliqué
if (isset($_POST['deco'])) {
    // Supprimer le cookie "prenom" en le définissant avec une date d'expiration passée
    setcookie('prenom', '', time() - 3600);
    // Recharger la page pour afficher à nouveau le formulaire de connexion
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

?>
