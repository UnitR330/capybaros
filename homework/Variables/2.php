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
Use the rand() function. Create two variables and use the rand() function to assign 
random values between 0 and 4. Divide the larger value by the smaller value.
Print the result rounded to 2 decimal places.
*/
</script>

<?php
$x = rand(0, 4);
$y = rand(0, 4);

$biggerNumber = max($x, $y);
$smallerNumber = min($x, $y);

if ($smallerNumber === 0) {
    echo "<p>Warning: Dividing by 0 is prohibited!</p>";
} else {
    $result = round($biggerNumber / $smallerNumber, 2);
    echo "<p>The result of dividing $biggerNumber by $smallerNumber is: $result</p>";
}
?>


</body>
</html>