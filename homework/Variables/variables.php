
//1
/*
Create 4 variables to store your first name, last name, year of birth and 
this year (not necessarily real). Write code that calculates your age based 
on your year of birth and prints the following sentence using the first and 
last name variables:
"I am 'Name' 'Surname'. I am XX year(s)".
*/


<?php
 $Name = "Unit";
$Surname = "R330";
$yearOfBirth = 1990;  
$currentYear = 2023;  

 $age = $currentYear - $yearOfBirth;

 echo "I am " . $Name . " " . $Surname . ". I am " . $age . " year(s).";
?>


//2
/*
Use the rand() function. Create two variables and use the rand() function to assign 
random values between 0 and 4. Divide the larger value by the smaller value.
Print the result rounded to 2 decimal places.
*/

<?php
 $firstValue = rand(0, 4);
$secondValue = rand(0, 4);

 $result = max($firstValue, $secondValue) / min($firstValue, $secondValue);

 echo "Result: " . number_format($result, 2);
?>

//3
/*
Use the rand() function. Create three variables and use the rand() 
function to assign them random values between 0 and 25. Find and 
print the variable with the middle value.
*/ 
<?php
// Generate random values between 0 and 25
$variable1 = rand(0, 25);
$variable2 = rand(0, 25);
$variable3 = rand(0, 25);

// Find the variable with the middle value
$middleVariable = $variable1;

if (($variable1 <= $variable2 && $variable2 <= $variable3) || ($variable3 <= $variable2 && $variable2 <= $variable1)) {
    $middleVariable = $variable2;
} elseif (($variable1 <= $variable3 && $variable3 <= $variable2) || ($variable2 <= $variable3 && $variable3 <= $variable1)) {
    $middleVariable = $variable3;
}

// Print the variable with the middle value
echo "Variable with the middle value: " . $middleVariable;
?>

//4
/*
Input numbers -a, b, c - edge lengths, three variables (use ​rand()​ function from 
1 to 10). Write a PHP program that determines whether a triangle can be formed 
and prints the answer.
*/
<?php
$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);

if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
  echo "A triangle can be formed.";
} else {
  echo "A triangle cannot be formed.";
}
?>

//5
/*
Create four variables and use the ​rand()​ function to generate them
values from 0 to 2. Count how many zeros, ones and twos there are. (not to use an array for the solution).
*/
<?php
$var1 = rand(0, 2);
$var2 = rand(0, 2);
$var3 = rand(0, 2);
$var4 = rand(0, 2);

$zeros = 0;
$ones = 0;
$twos = 0;

if ($var1 === 0) $zeros++;
elseif ($var1 === 1) $ones++;
else $twos++;

if ($var2 === 0) $zeros++;
elseif ($var2 === 1) $ones++;
else $twos++;

if ($var3 === 0) $zeros++;
elseif ($var3 === 1) $ones++;
else $twos++;

if ($var4 === 0) $zeros++;
elseif ($var4 === 1) $ones++;
else $twos++;

echo "Zeros: $zeros, Ones: $ones, Twos: $twos";
?>




//6

/*
Use the rand() function. Generate a random 
number from 1 to 6 and print it in the corresponding h tag. 
For example, the number 3- result: <h3>3</h3>
*/
<?php
$randNumber = rand(1, 6);
echo "<h$randNumber>$randNumber</h$randNumber>";
?>


//7
/*
Use the rand() function. Print 3 numbers from -10 to 10. Numbers 
below 0 should be green, 0 should be red, numbers above 0 should be blue.
*/

<?php
$number1 = rand(-10, 10);
$number2 = rand(-10, 10);
$number3 = rand(-10, 10);

echo "<span style='color: " . ($number1 < 0 ? 'green' : ($number1 === 0 ? 'red' : 'blue')) . ";'>$number1</span><br>";
echo "<span style='color: " . ($number2 < 0 ? 'green' : ($number2 === 0 ? 'red' : 'blue')) . ";'>$number2</span><br>";
echo "<span style='color: " . ($number3 < 0 ? 'green' : ($number3 === 0 ? 'red' : 'blue')) . ";'>$number3</span>";
?>


//8

/*
The company sells candles for 1 EUR. A 3% discount is applied for purchases over EUR 1000, 
a 4% discount for purchases over EUR 2000. Write a program that will calculate the price of 
candles and print the answer of how many candles are purchased and at what price. Generate 
the number of candles with the ​rand()​ function from 5 to 3000.

*/
<?php
// Generate a random number of candles between 5 and 3000
$numberOfCandles = rand(5, 3000);

// Price per candle (1 EUR)
$pricePerCandle = 1;

// Calculate the total price without any discount
$totalPrice = $numberOfCandles * $pricePerCandle;

// Apply discounts based on the total price
if ($totalPrice > 2000) {
    // 4% discount for purchases over 2000 EUR
    $discount = 0.04;
} elseif ($totalPrice > 1000) {
    // 3% discount for purchases over 1000 EUR
    $discount = 0.03;
} else {
    $discount = 0; // No discount
}

// Calculate the discounted price
$discountedPrice = $totalPrice - ($totalPrice * $discount);

echo "Number of Candles: $numberOfCandles<br>";
echo "Total Price: $totalPrice EUR<br>";
echo "Discounted Price: $discountedPrice EUR";
?>


//9
/*
Use the rand() function. Create three variables with a random value between 0 and 100. Calculate their 
arithmetic mean. And the arithmetic mean after discarding those values that are less than 10 or greater 
than 90. Print both averages. Round the results to a whole number.
*/

<?php
// Generate three random variables between 0 and 100
$var1 = rand(0, 100);
$var2 = rand(0, 100);
$var3 = rand(0, 100);

// Calculate the arithmetic mean
$originalMean = round(($var1 + $var2 + $var3) / 3);

// Discard values less than 10 or greater than 90
$var1 = ($var1 < 10 || $var1 > 90) ? 0 : $var1;
$var2 = ($var2 < 10 || $var2 > 90) ? 0 : $var2;
$var3 = ($var3 < 10 || $var3 > 90) ? 0 : $var3;

// Recalculate the arithmetic mean after discarding values
$adjustedMean = round(($var1 + $var2 + $var3) / 3);

echo "Original Mean: $originalMean<br>";
echo "Adjusted Mean: $adjustedMean";
?>



//10
/*
Make a digital clock that shows hours, minutes and seconds. Use the 
rand() function to generate the hours, minutes, and seconds. Generate 
a number from 0 to 300. These are extra seconds. Add the numbers to 
the already generated time. Print the clock before and after adding 
seconds and the number of seconds being added.
*/

<?php
// Generate random hours, minutes, and seconds
$hours = rand(0, 23);
$minutes = rand(0, 59);
$seconds = rand(0, 59);

// Generate extra seconds
$extraSeconds = rand(0, 300);

// Print the clock before adding extra seconds
echo "Before adding extra seconds: " . $hours . " : " . $minutes . " : " . $seconds;

// Add extra seconds and adjust the time
$totalSeconds = $hours * 3600 + $minutes * 60 + $seconds + $extraSeconds;
$hours = floor($totalSeconds / 3600);
$totalSeconds %= 3600;
$minutes = floor($totalSeconds / 60);
$seconds = $totalSeconds % 60;

// Print the clock after adding extra seconds
echo "After adding extra seconds: " . $hours . " : " . $minutes . " : " . $seconds;
echo "Number of seconds added: " . $extraSeconds;
?>


//10

<?php
// Generate random hours, minutes, and seconds
$hours = rand(0, 23);
$minutes = rand(0, 59);
$seconds = rand(0, 59);

// Display the initial clock
echo "Initial Clock: " . sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds) . "<br>";

// Generate extra seconds (between 0 and 300)
$extraSeconds = rand(0, 300);

// Add extra seconds to the time
$seconds += $extraSeconds;

// Adjust minutes and hours accordingly
$minutes += floor($seconds / 60);
$seconds %= 60;
$hours += floor($minutes / 60);
$minutes %= 60;

// Display the clock after adding seconds
echo "Clock After Adding Seconds: " . sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds) . "<br>";

echo "Seconds Added: " . $extraSeconds;
?>


//11
/*
Use the rand() function. Generate 6 variables with a random value between 1000 and 9999. 
Print the values in one string, sorted from largest to smallest, separated by spaces. 
Loops and arrays are NOT allowed.
*/

<?php
$a = rand(1000,9999);
$b = rand(1000,9999);
$c = rand(1000,9999);
$d = rand(1000,9999);
$e = rand(1000,9999);
$f = rand(1000,9999);

$max = max($a, $b, $c, $d, $e, $f);
$min = min($a, $b, $c, $d, $e, $f);
$mid = ($a + $b + $c + $d + $e + $f) - ($max + $min);

$result = $max . ' ' . $mid . ' ' . $min;
    
echo $result;
?>



//11*
// Generate 6 random variables between 1000 and 9999
<?php

$var1 = rand(1000, 9999);
$var2 = rand(1000, 9999);
$var3 = rand(1000, 9999);
$var4 = rand(1000, 9999);
$var5 = rand(1000, 9999);
$var6 = rand(1000, 9999);

// Arrange variables from largest to smallest
if ($var1 < $var2) { list($var1, $var2) = array($var2, $var1); }
if ($var2 < $var3) { list($var2, $var3) = array($var3, $var2); }
if ($var3 < $var4) { list($var3, $var4) = array($var4, $var3); }
if ($var4 < $var5) { list($var4, $var5) = array($var5, $var4); }
if ($var5 < $var6) { list($var5, $var6) = array($var6, $var5); }
if ($var1 < $var2) { list($var1, $var2) = array($var2, $var1); }
if ($var2 < $var3) { list($var2, $var3) = array($var3, $var2); }
if ($var3 < $var4) { list($var3, $var4) = array($var4, $var3); }
if ($var4 < $var5) { list($var4, $var5) = array($var5, $var4); }
if ($var1 < $var2) { list($var1, $var2) = array($var2, $var1); }
if ($var2 < $var3) { list($var2, $var3) = array($var3, $var2); }
if ($var3 < $var4) { list($var3, $var4) = array($var4, $var3); }
if ($var1 < $var2) { list($var1, $var2) = array($var2, $var1); }
if ($var2 < $var3) { list($var2, $var3) = array($var3, $var2); }
if ($var1 < $var2) { list($var1, $var2) = array($var2, $var1); }

echo "$var1 $var2 $var3 $var4 $var5 $var6";
?>
