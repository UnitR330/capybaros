<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculation</title>

</head>
<body>

<script>

/*
Use the rand() function. Create three variables and use the rand() 
function to assign them random values between 0 and 25. Find and 
print the variable with the middle value.
*/
</script>
 
<?php
$a = rand(0, 25);
$b = rand(0, 25);
$c = rand(0, 25);

echo "Generated numbers: $a, $b, $c <br>";

$middle = $a;

if (($a <= $b && $b <= $c) || ($c <= $b && $b <= $a)) {
    $middle = $b;
} elseif (($a <= $c && $c <= $b) || ($b <= $c && $c <= $a)) {
    $middle = $c;
}

echo "Variable with the middle value: " . $middle;
 
 ?>
 

</body>
</html>