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
A string generated by the following code: 'Star Wars: Episode '.str_repeat(' ', 
rand(0,5)). rand(1,9) . ' - A New Hope'; Find and print the episode number.


*/
$string = 'Star Wars: Episode ' . str_repeat(' ', rand(0, 5)) . rand(1, 9) . ' - A New Hope';
echo $string, '<br>';
preg_match('/Episode\s+(\d+)/', $string, $matches);
// preg_match('/Episode (\d+)/', $string, $matches);
var_dump($matches); 
if (!empty($matches[1])) {
    echo "The episode number is: " . $matches[1];
} else {
    echo "No episode number found in the string.";
}


?>



</body>
</html>