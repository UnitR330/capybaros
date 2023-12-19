<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbers ganerator</title>
</head>
<body>
<script>
/*
Create four variables and use the ​rand()​ function to generate them
values from 0 to 2. Count how many zeros, ones and twos there are. (not to use an array for the solution).
*/
</script>    
<?php
$var1 = rand(0, 2);
$var2 = rand(0, 2);
$var3 = rand(0, 2);
$var4 = rand(0, 2);

$zeros = 0;
$ones = 0;
$twos = 0;

if ($var1 === 0) $zeros++;
elseif ($var1 === 1) $ones++;
else $twos++;

if ($var2 === 0) $zeros++;
elseif ($var2 === 1) $ones++;
else $twos++;

if ($var3 === 0) $zeros++;
elseif ($var3 === 1) $ones++;
else $twos++;

if ($var4 === 0) $zeros++;
elseif ($var4 === 1) $ones++;
else $twos++;

echo "Zeros: $zeros, Ones: $ones, Twos: $twos";
?>

</body>
</html>