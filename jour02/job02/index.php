<?php
$excludedNumbers = [26, 37, 88, 1111, 1233];

for ($i = 0; $i <= 1337; $i++) {
    if (!in_array($i, $excludedNumbers)) {
        echo $i . "<br/>";
    }
}
?>
