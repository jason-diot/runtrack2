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

    // Requête SQL pour récupérer le nom et la capacité de chaque salle
    $requete = "SELECT Nom, Capacite FROM salles";
    $resultat = $bdd->query($requete);

    // Création du tableau HTML pour afficher les résultats
    echo '<table>';
    echo '<thead><tr><th>nom</th><th>capacite</th></tr></thead>';
    echo '<tbody>';

    // Boucle pour afficher chaque ligne de résultat
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $ligne['Nom'] . '</td>';
        echo '<td>' . $ligne['Capacite'] . '</td>';
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
