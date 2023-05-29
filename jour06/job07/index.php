<!DOCTYPE html>
<html>
<head>
    <title>Transformations de chaîne</title>
</head>
<body>
    <form action="" method="post">
        <label for="str">Chaîne de caractères :</label>
        <input type="text" name="str" id="str" required><br><br>

        <label for="fonction">Transformation :</label>
        <select name="fonction" id="fonction">
            <option value="gras">Gras</option>
            <option value="cesar">César</option>
            <option value="plateforme">Plateforme</option>
        </select><br><br>

        <input type="submit" value="Valider">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $str = $_POST["str"];
        $fonction = $_POST["fonction"];

        if ($fonction == "gras") {
            echo "<strong>" . ucwords($str) . "</strong>";
        } elseif ($fonction == "cesar") {
            $decalage = 2; // Valeur par défaut
            $cesarStr = "";

            if (isset($_POST["decalage"]) && is_numeric($_POST["decalage"])) {
                $decalage = (int)$_POST["decalage"];
            }

            $length = strlen($str);

            for ($i = 0; $i < $length; $i++) {
                $char = $str[$i];
                if (ctype_alpha($char)) {
                    $ascii = ord($char);
                    $ascii += $decalage;

                    if ($ascii > 122) {
                        $ascii -= 26;
                    } elseif ($ascii > 90 && $ascii < 97) {
                        $ascii -= 26;
                    }

                    $cesarStr .= chr($ascii);
                } else {
                    $cesarStr .= $char;
                }
            }

            echo $cesarStr;
        } elseif ($fonction == "plateforme") {
            $words = explode(" ", $str);
            $plateformeStr = "";

            foreach ($words as $word) {
                if (substr($word, -2) == "me") {
                    $plateformeStr .= $word . "_";
                } else {
                    $plateformeStr .= $word . " ";
                }
            }

            echo rtrim($plateformeStr);
        }
    }
    ?>
</body>
</html>
