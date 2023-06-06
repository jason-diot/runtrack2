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

    // Requête SQL pour récupérer la somme des capacités des salles
    $requete = "SELECT SUM(capacite) as capacite_totale FROM salles";
    $resultat = $bdd->query($requete);

    // Création du tableau HTML pour afficher le résultat
    echo '<table>';
    echo '<thead><tr><th>capacite_totale</th></tr></thead>';
    echo '<tbody>';

    // Affichage du résultat
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $ligne['capacite_totale'] . '</td>';
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
