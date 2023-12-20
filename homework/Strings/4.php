<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last three letters</title>
</head>
<body>
    

<?php

/*
Create two variables. Assign your favorite actor's name to them as stringus. Create a third 
variable and assign it a string consisting of the last three letters of the first and last 
name variables. Print it.

*/
$firstName = 'Andy';
$lastName = 'Sullivan';

$lastThreeLetters = substr($firstName, -3) . " " . substr($lastName, -3);

echo $lastThreeLetters;

?>


</body>
</html>