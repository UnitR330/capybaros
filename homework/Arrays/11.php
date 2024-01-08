<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 11</title>
</head>
<body>
    
<!-- 
    Generate a 101-element array with random numbers from 0 to 300. Regenerate 
    values that are not unique in that array so that all values in the array are 
    unique. Sort the array so that its largest value is in the middle of the array, 
    and decreasing values towards the beginning and end of the array. Calculate 
    the sums of the first and second parts of the array (excluding the middle part). 
    If the difference of sums (module, absolute size) is greater than | 30 | repeat 
    the sorting. (So that the sums do not differ from each other by more than 30)
 -->
<?php
$arr = [];
for ($i = 0; $i < 101; $i++) {
    do {
        $num = rand(0, 300);
    } while (in_array($num, $arr));
    $arr[] = $num;
}

$largestValue = max($arr);

$largestIndex = array_search($largestValue, $arr);

$arr[$largestIndex] = $arr[50];
$arr[50] = $largestValue;

function sortValuesAscending(&$array, $start, $end) {
    $valuesToSort = array_slice($array, $start, $end - $start + 1);
    sort($valuesToSort);
    array_splice($array, $start, $end - $start + 1, $valuesToSort);
}

function sortValuesDescending(&$array, $start, $end) {
    $valuesToSort = array_slice($array, $start, $end - $start + 1);
    rsort($valuesToSort);
    array_splice($array, $start, $end - $start + 1, $valuesToSort);
}

sortValuesAscending($arr, 0, 50);
sortValuesDescending($arr, 50, 100);

$sum1 = array_sum(array_slice($arr, 0, 50));
$sum2 = array_sum(array_slice($arr, 51, 50));

echo "<pre>";
print_r($arr);
echo "</pre>";

echo "Sum from 0 to 49: $sum1<br>";
echo "Sum from 51 to 100: $sum2<br>";

if ($sum1 > $sum2) {
    echo "Sum from 0 to 49 is greater than sum from 51 to 100.";
} elseif ($sum1 < $sum2) {
    echo "Sum from 0 to 49 is smaller than sum from 51 to 100.";
} else {
    echo "Sum from 0 to 49 is equal to sum from 51 to 100.";
}

function checkDifference($sum1, $sum2) {
    return abs($sum1 - $sum2);
}

$difference = checkDifference($sum1, $sum2);
echo "<pre>";
echo "Difference between the sums: $difference";
echo "</pre>";

?>



</body>
</html>