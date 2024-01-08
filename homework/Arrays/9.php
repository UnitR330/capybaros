<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 9</title>
</head>
<body>
    
    <!-- 
        Generate two arrays whose values are random numbers between 100 and 999. Array lengths 
        100. Array values must be unique within their array (ie, must not repeat). Generate third 
        array from first array indices but values put from array2.
    -->
    
    <?php 

$unique_values = range(100, 999);
shuffle($unique_values);
$array1 = array_slice($unique_values, 0, 100);
shuffle($unique_values);
$array2 = array_slice($unique_values, 0, 100);

echo "<pre>";
echo "First Array: " . implode(', ', $array1) . "<br>Consist of:" . count($array1);
echo "Second Array: " . implode(', ', $array2) . "<br>Consist of:" . count($array2);

$array3 = [];

for ($i = 0; $i < count($array1); $i++) {
    $index = $array1[$i];
    $value = $array2[$i];
    $array3[$index] = $value;   
    
}

echo "Third Array: " . implode(', ', $array3) . "<br>Consist of:" . count($array3);


print_r($array1);
print_r($array2);
echo '<br>';
print_r($array3); 
echo "</pre>";
?>


</body>
</html>