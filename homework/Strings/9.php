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
Count how many words in the string "Don't Be a Menace to South Central While Drinking 
Your Juice in the Hood" are shorter than or equal to 5 letters. Repeat the code with 
the string "Just don't scare South Central while drinking juice at your place on the 
block."
*/

$string1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
echo $string1, '<br>';
$string2 = "Just don't scare South Central while drinking juice at your place on the block.";
echo $string2,  '<br>';

function countShortWords($string) {
    $words = explode(' ', $string);
    $shortWords = array_filter($words, function ($word) {
        return strlen($word) <= 5;
    });
    
    $count = count($shortWords);
    return $count;
}
echo '<pre>';

$count1 = countShortWords($string1);
echo "Number of words with 5 or fewer letters in the first string: $count1<br>";
$count2 = countShortWords($string2);
echo "Number of words with 5 or fewer letters in the second string: $count2";

/*
$string1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$words1 = explode(' ', $string1);

$count1 = 0;
foreach ($words1 as $word) {
    $word = preg_replace('/[^a-zA-Z]/', '', $word);
    
    if (mb_strlen($word) <= 5) {
        $count1++;
    }
}

echo "Number of words in the first string with length <= 5: $count1\n";

$string2 = "Just don't scare South Central while drinking juice at your place on the block.";
$words2 = explode(' ', $string2);

$count2 = 0;
foreach ($words2 as $word) {
    $word = preg_replace('/[^a-zA-Z]/', '', $word);
    
    if (mb_strlen($word) <= 5) {
        $count2++;
    }
}

echo "Number of words in the second string with length <= 5: $count2\n";
*/


























?>



</body>
</html>