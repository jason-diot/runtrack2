<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>
    <form method="get" action="">
        <input type="text" name="Nom" placeholder="Nom"><br>
        <input type="text" name="Prenom" placeholder="Prenom"><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifier si des arguments GET ont été envoyés
    if ($_GET) {
        echo '<table>';
        echo '<tr><th>Argument</th><th>Valeur</th></tr>';

        // Parcourir les arguments GET
        foreach ($_GET as $argument => $valeur) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($argument) . '</td>';
            echo '<td>' . htmlspecialchars($valeur) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Aucun argument GET n'a été envoyé.";
    }
    ?>
</body>
</html>
