<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorter string</title>
</head>
<body>

<?php

/*
Create two variables. Assign the name of your beloved actor as stringus (Jonas Jonaitis) to them. 
Print the shorter string.
*/

$actor1 = 'Albert';
$actor2 = 'Unbeval';

if (strlen($actor1) < strlen($actor2)) {
    echo $actor1;
} else {
    echo $actor2;
}

?>


</body>
</html>