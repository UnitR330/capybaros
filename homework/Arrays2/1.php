    <!-- 
Generate an array of 10 elements whose elements are arrays of 5 elements with values between 5 and 25.
1. Count how many elements in the array are greater than 10;
2. Find the value of the largest element;
3. Count the sums of each second-level array with the same indices (i.e. the sum of values with index 0, 1, etc.)
4. "Extend" all second-level arrays to 7 elements
5. Calculate the sum of each of the elements of the second-level arrays separately and use the sums as values when 
creating a new array. I.e. first the value of the new array must be equal to the sum of all elements of the smaller 
array with index 0 in the large array
     -->

     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>

<?php

$originalArray = [];
for ($i = 0; $i < 10; $i++) {
    $originalArray[] = array_map(function () {
        return rand(5, 25);
    }, range(1, 5));
}

$greaterThan10Count = 0;
foreach ($originalArray as $subArray) {
    $greaterThan10Count += count(array_filter($subArray, function ($value) {
        return $value > 10;
    }));
}

$flattenedArray = array_merge(...$originalArray);
$largestElement = max($flattenedArray);

$sums = array_map(function (...$arrays) {
    return array_sum($arrays);
}, ...$originalArray);

$extendedArrays = array_map(function ($subArray) {
    $extended = array_merge($subArray, array_fill(0, 2, 0)); 
    return array_sum($extended);  
}, $originalArray);

?>

    <h2>Task 1 - Original Array:</h2>
    <pre><?php print_r($originalArray); ?></pre>

    <h2>Task 2 - Count Greater Than 10:</h2>
    <p><?php echo $greaterThan10Count; ?></p>

    <h2>Task 3 - Largest Element:</h2>
    <p><?php echo $largestElement; ?></p>

    <h2>Task 4 - Sums of Second-level Arrays:</h2>
    <pre><?php print_r($sums); ?></pre>

    <h2>Task 5 - Extended Arrays with Sums:</h2>
    <pre><?php print_r($extendedArrays); ?></pre>

</body>
</html>
