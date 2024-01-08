<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>

<!-- 
 Generate an array of 30 elements (indexes 0 to 29) whose values are random 
 numbers 5 to 25.   
 -->


<?php
$randomNumbers = [];

for ($i = 0; $i < 30; $i++) {
    $randomNumbers[$i] = rand(5, 25);
}

echo '<pre>';
print_r($randomNumbers);
echo '</pre>';
?>


    
</body>
</html>