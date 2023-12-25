<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- 
4. Generate an array whose values are the random letters A, B, C, and D, and the length is 
200. Sort the array alphabetically.
 -->

 <?php

$letters = ['A', 'B', 'C', 'D'];
$randomArray = [];

for ($i = 0; $i < 200; $i++) {
    $randomArray[] = $letters[array_rand($letters)];
}

sort($randomArray);

echo "Generated and Sorted Array: " . implode(', ', $randomArray);

?>



</body>
</html>