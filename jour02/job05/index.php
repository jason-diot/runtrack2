<?php
for ($n = 2; $n <= 1000; $n++) {
    $estPremier = true;

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            $estPremier = false;
            break;
        }
    }

    if ($estPremier) {
        echo $n . "<br />";
    }
}
?>
