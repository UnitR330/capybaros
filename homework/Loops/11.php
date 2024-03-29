<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 11 random and prime</title>
    <!-- 
        Generate a string consisting of 50 random numbers between 1 and 200, separated by spaces. 
        Numbers must be unique (i.e. not repeated). Generate a second string using the first, 
        leaving only prime numbers in it (i.e. those that are divisible by only 1 and themselves). 
        Arrange the numbers in the string in ascending order, from smallest to largest.
     -->
</head>
<body>

<?php

function generateRandomNumbers($count, $min, $max) {
    $numbers = [];
    while (count($numbers) < $count) {
        $randomNumber = rand($min, $max);
        if (!in_array($randomNumber, $numbers)) {
            $numbers[] = $randomNumber;
        }
    }
    return implode(' ', $numbers);
}

function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function filterAndSortPrimes($numbersString) {
    $numbers = explode(' ', $numbersString);
    $primes = array_filter($numbers, function ($number) {
        return isPrime($number);
    });
    sort($primes);
    return implode(' ', $primes);
}

$randomNumbersString = generateRandomNumbers(50, 1, 200);
$primesString = filterAndSortPrimes($randomNumbersString);

echo "<p>Random Numbers: $randomNumbersString</p>";
echo "<p>Prime Numbers: $primesString</p>";

?>

</body>
</html>
