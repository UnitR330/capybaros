<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
</head>
<body>
    
<!-- 
2. Generate an array of 30 elements (indexes 0 to 29) whose values are random 
numbers 5 to 25.   
2a Count how many values are greater than 10 in the array;
2b Find the largest value of an array and its index or indices if there are several;
2c Calculate the sum of all paired (even) index values
2d Create a new array whose values are the array values of problem 1 minus the index of that value;
2e Fill the array with an additional 10 elements with values from 5 to 25 to increase the total array to index 39;
2f Create two new arrays from the elements of the array. One must consist of odd index values and the other of even ones;
2g Make the elements of the primary array with even indices equal to 0 if they are greater than 15;
2h Find the first (smallest) index whose element value is greater than 10;
2i Use the unset() function to delete all elements with an even index from the array;

-->

<?php

function findMaxValueAndIndices($array) {
    $maxValue = max($array);
    $indices = array_keys($array, $maxValue);
    return ['value' => $maxValue, 'indices' => $indices];
}

function sumOfEvenIndices($array) {
    $sum = 0;
    foreach ($array as $index => $value) {
        if ($index % 2 === 0) {
            $sum += $value;
        }
    }
    return $sum;
}

function subtractIndexFromValue($array) {
    $Array2 = [];
    foreach ($array as $index => $value) {
        $Array2[] = $value - $index;
    }
    return $Array2;
}

$randomNumbers = [];

for ($i = 0; $i < 30; $i++) {
    $randomNumbers[$i] = rand(5, 25);
}

echo '<pre>';
print_r($randomNumbers);
echo '</pre>';

// 2a Count how many values are greater than 10
$countGreaterThan10 = 0;
foreach ($randomNumbers as $number) {
    if ($number > 10) {
        $countGreaterThan10++;
    }
}
echo "2a: Random numbers greater than 10: $countGreaterThan10<br>";

// 2b Find the largest value of an array and its index or indices if there are several
$maxInfo = findMaxValueAndIndices($randomNumbers);
echo "2b: The largest value in the array is {$maxInfo['value']} at index/indexes: " . implode(', ', $maxInfo['indices']) . "<br>";

// 2c Calculate the sum of all paired (even) index values
$sumEvenIndices = sumOfEvenIndices($randomNumbers);
echo "2c: Sum of all paired (even) index values: $sumEvenIndices<br>";

// 2d Create a new array23 whose values are the array values minus the index of that value
$Array2 = subtractIndexFromValue($randomNumbers);
echo "2d: New array23 with values minus their indices: ";
echo '<pre>';
print_r($Array2);
echo '</pre>';
 
 


// Assuming $Array2 is already defined in your code (from the previous questions)

// Generate an array with 10 random numbers between 5 and 25
$additionalElements = array_map(function () {
    return rand(5, 25);
}, range(1, 10));

// Create Array3 by merging Array2 with the additional random elements
$Array3 = array_merge($Array2, $additionalElements);

echo "2e: Array3 with additional 10 random elements: ";
echo '<pre>';
print_r($Array3);
echo '</pre>';

/*
// 2e: Create Array3 from Array2 by filling an additional 10 elements with values from 5 to 25
$Xarray = $Array2;  
$Array3 = array_merge($Xarray, array_fill(30, 10, rand(0, 25)));
echo "2e: Array3 with additional 10 elements: ";
echo '<pre>';
print_r($Array3);
echo '</pre>';
*/

// 2f: Create two new arrays from the elements of the array. One must consist of odd index values and the other of even ones;
$Array4 = [];
$Array5 = [];

foreach ($Array3 as $index => $value) {
    if ($index % 2 === 0) {
        $Array5[] = $value;
    } else {
        $Array4[] = $value;
    }
}

echo "2f: Array4 (Odd index values): ";
echo '<pre>';
print_r($Array4);
echo '</pre>';

echo "2f: Array5 (Even index values): ";
echo '<pre>';
print_r($Array5);
echo '</pre>';

//2g Make the elements of the primary array with even indices equal to 0 if they are greater than 15;
$Array6 = [];
foreach ($Array3 as $index => $value) {
    if ($index % 2 === 0 && $value >= 15) {
        $Array6[] = 0;
    } else {
        $Array6[] = $value;
    }
}

echo "2g: Array6 (Modified even indices to 0 if it is bigger than 15): ";
echo '<pre>';
print_r($Array6);
echo '</pre>';


function findFirstIndexGreaterThan10($array) {
    foreach ($array as $index => $value) {
        if ($value > 10) {
            return $index;
        }
    }
    return null; // Return null if no such index is found
}

$firstIndexGreaterThan10 = findFirstIndexGreaterThan10($Array3);

echo "2h: The first index in Array3 with value greater than 10 is: $firstIndexGreaterThan10";
echo '<br>';

// 2i Use the unset() function to delete all elements with an even index from the array;
foreach (array_keys($Array3) as $index) {
    if ($index % 2 === 0) {
        unset($Array3[$index]);
    }
}

$Array3 = array_values($Array3);

echo "2i: Array3 after deleting all elements with even index: ";
echo '<pre>';
print_r($Array3);
echo '</pre>';

?>



</body>

</html>