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
Create a variable with the string: "An American in Paris". In it, 
replace all "a" (uppercase and lowercase) with asterisks "*". Print 
the result.

*/
$phrase = "An Englishman in New York";
$result = str_ireplace('n', '*', $phrase);
echo $result;

?>


    
</body>
</html>