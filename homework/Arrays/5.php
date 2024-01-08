<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>
<body>
    
<!-- 
    Generate 3 arrays with random values A, B, C, D and length of 200 elements each. Add the arrays by adding 
    the corresponding values. Count how many unique (one by one, non-repeating) values and how many unique 
    combinations you got.
 -->

 <?php

function generateRandomArray($length) {
    $letters = ['A', 'B', 'C', 'D'];
    $randomArray = [];

    for ($i = 0; $i < $length; $i++) {
        $randomArray[] = $letters[array_rand($letters)];
    }

    return $randomArray;
}

$array1 = generateRandomArray(200);
$array2 = generateRandomArray(200);
$array3 = generateRandomArray(200);

echo '<pre>';
print_r($array1);
$uniqueValuesCount = count(array_unique($array1));
echo "Unique Values Count Array1: $uniqueValuesCount<br>";
echo '</pre>';

echo '<pre>';
print_r($array2);
$uniqueValuesCount2 = count(array_unique($array2));
echo "Unique Values Count Array2: $uniqueValuesCount2<br>";
echo '</pre>';

echo '<pre>';
print_r($array3);
$uniqueValuesCount3 = count(array_unique($array3));
echo "Unique Values Count Array3: $uniqueValuesCount3<br>";
echo '</pre>';

$sumArray = array_map(function($a, $b, $c) {
    return $a . $b . $c;
}, $array1, $array2, $array3);

echo '<pre>';
print_r($sumArray);
echo '</pre>';

$uniqueValuesCount4 = count(array_unique($sumArray));
echo "Unique Values Count sumArray: $uniqueValuesCount4<br>";
echo '<br>';
$uniqueCombinationsCount = array_count_values($sumArray);
print_r($uniqueCombinationsCount);



?>



</body>
</html>