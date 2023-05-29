<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <form method="get" action="">
        <input type="text" name="Nom" placeholder="Nom"><br>
        <input type="text" name="Prenom" placeholder="Prenom"><br>
        <input type="text" name="Métier" placeholder="Métier"><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifier si des arguments GET ont été envoyés
    if ($_GET) {
        // Compter le nombre d'arguments GET
        $nombreArguments = count($_GET);

        // Afficher le résultat
        echo "Le nombre d'arguments GET envoyé est : " . $nombreArguments;
    }
    ?>
</body>
</html>
