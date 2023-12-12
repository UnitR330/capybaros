

//1 
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

// 2
$one = 12;
$result = 1 == $one? '1' : (2 == $one? '2' : 'IdonotKnow');
echo $result;
echo '<br>';


//3
$who = null;
var_dump(isset($who));
echo '<br>';
// $who2 = null;
var_dump($who2 ?? 8 === null);
echo '<br>';

for ($k = 1; $k <= 15; $k++) {
    echo "Bigger: $k<br>";
    
for ($i =1; $i <= 15; $i++)  {
    if (rand(0, 10) > 9) {
        continue 2; // break 1;
    }
    echo "Smaller: $i<br>";
   
}
echo "Loop is over<br>";
}

//4

for ($b = 1; $b <=7; $b++) {
    switch($b) {
        case 1:
            echo 'One<br>';
        case 2:
            echo 'Two<br>';
        case 3:
            echo 'Three<br>';
        case 4:
            echo 'Four<br>';
        case 5:
            echo 'Five<br>';
        case 6:
            echo 'Six<br>';
        default:
            echo 'No matches<br>';
            
    }
}
echo '<br>';

$a = 3;

$numbers = match(true) {
  //  1 => 'One',
  //  2 => 'Two',
  //  3 => 'Three',
  //  4 => 'Four',
  //  5 => 'Five',
    $a == 2 => 'Two',
    $a == 3 => 'Three',
    $a > 5 && $a <10 => 'More than 5, bet no more than 10',
    $a > 10 => 'More than 10',
    $a > 10 => 'More than 10', 
    default => 'Less than 5',
};

echo $numbers;



