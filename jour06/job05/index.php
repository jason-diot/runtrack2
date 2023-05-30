<?php
function occurrences($str, $char) {
    $count = 0;
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }

    return $count;
}

$str = "Bonjour";
$char = "o";

$occurrences = occurrences($str, $char);
echo $occurrences; 
?>