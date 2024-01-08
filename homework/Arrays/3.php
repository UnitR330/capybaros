<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>
<body>

<!-- 
3. Generate an array whose values are the random letters A, B, C, and D, and the length is 
200. Count the number of each letter.
 -->
 <?php

$letters = ['A', 'B', 'C', 'D'];
$randomArray = [];

for ($i = 0; $i < 200; $i++) {
    $randomArray[] = $letters[array_rand($letters)];
}
$letterCounts = array_count_values($randomArray);
echo "Generated Array: " . implode(', ', $randomArray) . "<br>";

foreach ($letterCounts as $letter => $count) {
    echo "Letter $letter appears $count times.<br>";
}

?>

    
</body>
</html>