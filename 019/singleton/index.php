<?php

require __DIR__ . '/Cart.php';

$cartOne = Cart::getCart();
$cartTwo = Cart::getCart();

// $cartTwo = unserialize(serialize($cartOne));

echo '<pre>';

var_dump($cartOne);
var_dump($cartTwo);
