<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php

/*
Use the rand() function. Generate 6 variables with a random value between 1000 and 
9999. Print the values in one string, sorted from largest to smallest, separated by 
spaces. Loops and arrays are NOT allowed.
*/
$var1 = rand(1000, 9999);
$var2 = rand(1000, 9999);
$var3 = rand(1000, 9999);
$var4 = rand(1000, 9999);
$var5 = rand(1000, 9999);
$var6 = rand(1000, 9999);

$string = "$var1 $var2 $var3 $var4 $var5 $var6";

$values = explode(' ', $string);

rsort($values, SORT_NUMERIC);

$result = implode(' ', $values);

echo $result;

?>


</body>
</html>