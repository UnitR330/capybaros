<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle</title>
</head>
<body>

<script>
/*
Input numbers -a, b, c - edge lengths, three variables (use ​rand()​ function from 
1 to 10). Write a PHP program that determines whether a triangle can be formed 
and prints the answer.
*/
</script>
 
<?php
 
$a = rand(50, 100);
$b = rand(50, 100);
$c = rand(50, 100);
echo "Random numbers: $a, $b, $c <br>";

if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
  echo "A triangle can be formed.";

} else {
  echo "A triangle cannot be formed.";
}
 
?>
 

</body>
</html>