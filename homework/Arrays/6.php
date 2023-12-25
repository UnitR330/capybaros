<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<!-- 
Generate two arrays whose values are random numbers between 100 and 999. 
Array lengths 100. Array values must be unique within their array (ie, 
must not repeat).
 -->
<?php


 $unique_values = range(100, 999);
shuffle($unique_values);
$array1 = array_slice($unique_values, 0, 100);
shuffle($unique_values);
$array2 = array_slice($unique_values, 0, 100);

echo "Array 1: " . implode(', ', $array1) . "<br>";
echo "Array 2: " . implode(', ', $array2) . "<br>";

?>


</body>
</html>