<?php

$jonas = rand(5, 25);
$petras = rand(10, 20);

echo "Jonas: $jonas Petras: $petras <br>";

if ($jonas > $petras) {
    echo 'Jonas win!';
} elseif ($jonas < $petras) {
    echo 'Petras win!';
} else {
    echo 'Take another round!';
}

echo '<br>';