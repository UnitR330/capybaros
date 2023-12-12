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

$one = 12;
$result = 1 == $one? '1' : (2 == $one? '2' : 'IdonotKnow');
echo $result;
echo '<br>';



$who = null;
var_dump(isset($who));
echo '<br>';
// $who2 = null;
var_dump($who2 ?? 8 === null);
