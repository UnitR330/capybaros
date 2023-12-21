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
Write code that generates a random string from Latin lowercase letters. 
String length 3 characters.
*/
 
function generateRandomString() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    
    // Filter only lowercase letters
    $filteredCharacters = preg_replace('/[^a-z]/', '', $characters);

    $shuffledString = str_shuffle($filteredCharacters);
    $randomString = substr($shuffledString, 0, 3);

    return $randomString;
}

// Call the function to generate a random string
$randomString = generateRandomString();

// Output the generated random string
echo "Random String: $randomString";
 

?>
    
</body>
</html>