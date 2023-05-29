<!DOCTYPE html>
<html>
<head>
    <title>Formulaire POST</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="argument1" placeholder="Argument 1"><br>
        <input type="text" name="argument2" placeholder="Argument 2"><br>
        <input type="text" name="argument3" placeholder="Argument 3"><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifier si des arguments POST ont été envoyés
    if ($_POST) {
        // Compter le nombre d'arguments POST
        $nombreArguments = count($_POST);

        // Afficher le résultat
        echo "Le nombre d'arguments POST envoyé est : " . $nombreArguments;
    } else {
        echo "Aucun argument POST n'a été envoyé.";
    }
    ?>
</body>
</html>
