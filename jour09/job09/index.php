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

    // Requête SQL pour récupérer les informations des salles triées par capacité décroissante
    $requete = "SELECT * FROM salles ORDER BY Capacite DESC";
    $resultat = $bdd->query($requete);

    // Création du tableau HTML pour afficher le résultat
    echo '<table>';
    echo '<thead><tr><th>id</th><th>nom</th><th>etage</th><th>capacite</th></tr></thead>';
    echo '<tbody>';

    // Affichage du résultat
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $ligne['Id'] . '</td>';
        echo '<td>' . $ligne['Nom'] . '</td>';
        echo '<td>' . $ligne['id_etage'] . '</td>';
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
