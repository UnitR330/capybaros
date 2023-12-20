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
Create a variable with the string: "An American in Paris". Count all "a" 
(uppercase and lowercase) letters. Print the result.

*/

$sentance = "An Englishman in New York";
$countA = substr_count(strtolower($sentance), 'a');
echo $sentance, '<br>';

echo "In this text i found $countA 'a' letter(s)" ;

?>


</body>
</html>