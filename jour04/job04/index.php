<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="Nom" placeholder="Nom"><br>
        <input type="text" name="Prenom" placeholder="Prenom"><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifier si des arguments POST ont été envoyés
    if ($_POST) {
        echo '<table>';
        echo '<tr><th>Argument</th><th>Valeur</th></tr>';

        // Parcourir les arguments POST
        foreach ($_POST as $argument => $valeur) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($argument) . '</td>';
            echo '<td>' . htmlspecialchars($valeur) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Aucun argument POST n'a été envoyé.";
    }
    ?>
</body>
</html>
