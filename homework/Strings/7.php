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
Create a variable with the string: "An Englishman in New York". Delete all the vowels 
in it. Print the result. Repeat the code with strings: "Breakfast at Tiffany's", 
"2001: A Space Odyssey" and "It's a Wonderful Life".

*/

$string1 = "An Englishman in New York";
$result1 = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $string1);
echo $string1, '<br>';
echo "Result for \"$string1\": $result1<br><br>";

$string2 = "Breakfast at Tiffany's";
$result2 = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $string2);
echo $string2, '<br>';
echo "Result for \"$string2\": $result2<br><br>";

$string3 = "2001: A Space Odyssey";
$result3 = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $string3);
echo $string3, '<br>';
echo "Result for \"$string3\": $result3<br><br>";
 
$string4 = "It's a Wonderful Life";
$result4 = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $string4);
echo $string4, '<br>';
echo "Result for \"$string4\": $result4<br><br>";


?>



</body>
</html>