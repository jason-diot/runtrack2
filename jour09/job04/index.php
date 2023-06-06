<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "Nosajd/06210";
$baseDeDonnees = "jour08";

// Connexion à la base de données avec mysqli
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

// Requête SQL pour récupérer les informations des étudiants dont le prénom commence par "T"
$requete = "SELECT * FROM étudiants WHERE Prénom LIKE 'T%'";
$resultat = $connexion->query($requete);

// Création du tableau HTML pour afficher les résultats
echo '<table>';
echo '<thead><tr><th>id</th><th>prenom</th><th>nom</th><th>naissance</th><th>sexe</th><th>email</th></tr></thead>';
echo '<tbody>';

// Boucle pour afficher chaque ligne de résultat
while ($ligne = $resultat->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $ligne['Id'] . '</td>';
    echo '<td>' . $ligne['Prénom'] . '</td>';
    echo '<td>' . $ligne['Nom'] . '</td>';
    echo '<td>' . $ligne['Naissance'] . '</td>';
    echo '<td>' . $ligne['Sexe'] . '</td>';
    echo '<td>' . $ligne['Email'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Fermeture de la connexion à la base de données
$connexion->close();
?>
