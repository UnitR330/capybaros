<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade company</title>
</head>
<body>

<?php
/*
The company sells candles for 1 EUR. A 3% discount is applied for purchases over EUR 1000, 
a 4% discount for purchases over EUR 2000. Write a program that will calculate the price of 
candles and print the answer of how many candles are purchased and at what price. Generate 
the number of candles with the ​rand()​ function from 5 to 3000.
*/

$randCandles = rand(5, 3000);
$pricePerCandle = 1;

$totalPrice = $randCandles * $pricePerCandle;

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

echo "Quantity of Candles: $randCandles<br>";
echo "Total Price: $totalPrice EUR<br>";
echo "Discounted Price: $discountedPrice EUR";

?>


</body>
</html>