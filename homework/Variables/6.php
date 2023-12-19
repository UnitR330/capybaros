<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H tag</title>
</head>
<body>
<?php
/*
Use the rand() function. Generate a random 
number from 1 to 6 and print it in the corresponding h tag. 
For example, the number 3- result: <h3>3</h3>
*/

$randNumber = rand(1, 6);
echo "<h$randNumber>$randNumber</h$randNumber>";
?>

</body>
</html>