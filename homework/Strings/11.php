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
Write code to generate a random string with 10 words arranged in random order, 
taking the words for generation from the two strings given in problem 9. Words 
must not be repeated. (will need an array)
*/
$str1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
echo $str1, '<br>';
$str2 = "Just don't scare South Central while drinking juice at your place on the block.";
echo $str2, '<br>';
$combinedString = $str1 . ' ' . $str2;
$uniqueWords = array_unique(str_word_count($combinedString, 1));

shuffle($uniqueWords);

$randomString = implode(' ', array_slice($uniqueWords, 0, 10));
echo '<pre>';
echo "Compbined and mixed: $randomString";

?>


</body>
</html>