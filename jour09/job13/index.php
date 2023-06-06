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

    // Requête SQL pour récupérer le nom des salles et le nom de leur étage
    $requete = "SELECT salles.nom AS nom_salle, étages.nom AS nom_etage FROM salles INNER JOIN étages ON salles.id_etage = étages.id";
    $resultat = $bdd->query($requete);

    // Création du tableau HTML pour afficher le résultat
    echo '<table>';
    echo '<thead><tr><th>nom_salle</th><th>nom_etage</th></tr></thead>';
    echo '<tbody>';

    // Affichage du résultat
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $ligne['nom_salle'] . '</td>';
        echo '<td>' . $ligne['nom_etage'] . '</td>';
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
