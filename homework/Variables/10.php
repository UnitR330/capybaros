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
Make a digital clock that shows hours, minutes and seconds. Use the 
rand() function to generate the hours, minutes, and seconds. Generate 
a number from 0 to 300. These are extra seconds. Add the numbers to 
the already generated time. Print the clock before and after adding 
seconds and the number of seconds being added.    
*/
$hours = rand(0, 23);
$minutes = rand(0, 59);
$seconds = rand(0, 59);

$extraSeconds = rand(0, 300);

echo "Time before adding extra seconds: " . $hours . " : " . $minutes . " : " . $seconds . " ";

$totalSeconds = $hours * 3600 + $minutes * 60 + $seconds + $extraSeconds;
$hours = floor($totalSeconds / 3600);
$totalSeconds %= 3600;
$minutes = floor($totalSeconds / 60);
$seconds = $totalSeconds % 60;

echo "Additional seconds: " . $extraSeconds . " ";
echo "Standart time + extra seconds: " . $hours . " : " . $minutes . " : " . $seconds . " ";
 
    
?>
</body>
</html>