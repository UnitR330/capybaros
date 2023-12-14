<?php 

echo '<pre>';

$arr = ['racoon', 'rabbit', 'fox'];

//do not do this
$badArray = array('racoon', 'rabbit', 'fox');

print_r($badArray);


// Array is a very primitive, and because of this no link , but copia
$arr2 = $arr;
$arr2[0] = 'dog';

array_push($arr, 'cat'); //lame
$arr[] = 'cat'; //cool


array_unshift($arr, 'mouse');
array_pop($arr2);
array_shift($arr2);


//$arr[19] = 'cow';


$arr['yard'] = 'list';
$arr[''] = 'list2';
$arr[''] = 'list3';
$arr[] = 'Cool Cat';
array_unshift($arr, 'Cool Cat');



$arr[true + true] = 'true';
$arr[false] = 'false';
$arr['01'] = '1 stringas';

$arr['8.1'] = '8.1 Float';

$arr4[] = array_values($arr);

print_r($arr2);

print_r($arr);
print_r($arr4);

echo '<br>';

echo count($arr);

foreach ($arr as $index => $value) {
    echo "[index] => $value<br>";
}


foreach ($arr as $index => &$value) {
    // $value => 'kate winslet';
    //$arr[$index] = $index % 2 ? 'kate winslet' : 'leonardo dikaprio';
    // $arr[$index] => 'kate winslet';
    $value = 'kate winslet';
 }

$A = 5;
//$B = $A;
$B = &$A;

$A++;

echo '<br>';

echo $A, ' ', $B;

echo '<br>';

print_r($arr);

$colors = ['red', 'green', false, 'blue', 'yellow'];

foreach ($color as &$color) {}
unset($color); // panaikinam nuoroda i paskutini elementa0

foreach ($color as $color) {}


echo '<br>';

print_r($colors);

echo current($colors);

echo '<br>';
next($colors);
echo current($colors) . '<br>';
next($colors);
echo current($colors) . '<br>';
echo next($colors);
echo current($colors) . '<br>';
echo next($colors);
var_dump(current($colors)) . '<br>';

echo '<br>';

do {
    echo current($colors) . '<br>';
}   while (next($colors));


echo '<br>';

for ($i = 1; $i < 6; $i++) {
    echo "$i <br>";
}
foreach (range (1, 5) as $i) {
    echo "$i <br>";
}

