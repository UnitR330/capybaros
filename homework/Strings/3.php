<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogramm</title>
</head>
<body>
    
<?php

/*
Create two variables. Assign your favorite actor's name to them as stringus. 
Create a third variable and assign it a string consisting of the first letters 
of the first and last name variables. Print it.
*/

$firstName = 'Angela';
$lastName = 'Winslou';

$initials = substr($firstName, 0, 1) . substr($lastName, 0, 1);

echo $initials;


?>


</body>
</html>