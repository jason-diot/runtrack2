<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "Nosajd/06210";
$baseDeDonnees = "jour08";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8", $utilisateur, $motDePasse);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer le prénom, le nom et la date de naissance des étudiants de sexe féminin
    $requete = "SELECT Prénom, Nom, Naissance FROM étudiants WHERE Sexe = 'Femme'";
    $resultat = $bdd->query($requete);

    // Création du tableau HTML pour afficher les résultats
    echo '<table>';
    echo '<thead><tr><th>prenom</th><th>nom</th><th>naissance</th></tr></thead>';
    echo '<tbody>';

    // Boucle pour afficher chaque ligne de résultat
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $ligne['Prénom'] . '</td>';
        echo '<td>' . $ligne['Nom'] . '</td>';
        echo '<td>' . $ligne['Naissance'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    // Fermeture de la connexion à la base de données
    $bdd = null;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
