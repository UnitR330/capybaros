<?php

// declare(strict_types = 1);

echo '<pre>';

function noReturn() :void {
    echo '<br>I have no return value.<br>';
}

$noReturnValue = noReturn();

var_dump($noReturnValue);

/*
function $returnInt :int | string (
    return 1;
    )
    echo '<br>';
    
    $returnIntValue  = returnInt();
    var_dump($returnIntValue);
    echo '<br>';
    */    
    
    $didYouSee = 'Yes, I can see';
    function tryToSeeMe() {

        global $didYouSee, $imInFunction;
        $imInFunction = 'I am in function, you can not see';
        return $didYouSee;
    }
    echo '<br>';
    
    $tryToSeeMeValue = tryToSeeMe();
    var_dump($tryToSeeMeValue);
    var_dump($imInFunction);

function sum(int $a, int $b) :int {
    return $a + $b;
}

echo '<br>';
$sumResult = sum(-8, 5, 7);
var_dump($sumResult);

echo '<br>';

var_dump(5 == '8');

function summAll(...$numbers) :int {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo '<br>';
$sumAllResult = summAll (1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
var_dump($sumAllResult);
$myDigits = [7, 7, 7];
var_dump(summAll(...$myDigits));

echo '<br>';


function withStatic() {
    static $static = 0; //only once
    $static++;
    echo $static . '<br>';
}

withStatic();
withStatic();
withStatic();
withStatic();

echo '<br>';

function withRecursive($a) {
    if ($a <= 3) {
        echo 'IN' . $a . '<br>';
        withRecursive($a + 1);
    }

    echo 'OUT' . $a . '<br>';
}
withRecursive(1);

$arrayFancy = [
[5, [8, 3]],


];

print_r($arrayFancy);

function sumArray($array) :int {
    $sum = 0;
    foreach ($array as $value) {
        if (is_array($value)) {

        }
    }
    return $sum;
}

echo '<br>';
echo sumArray($arrayFancy);


$anonymous = function() {
    echo 'I am anonymous function';
    return function() {
        echo 'I am anonymous function inside anonymous function isnide';
    };
};

$anonymous()();

echo '<br><br>';

function withCallback($callback) {
    echo 'Iam in function with callback!<br>';
    $callback();
}

$abc = 123;

withCallback(function() use ($abc) {
    echo 'I am anonymous function inside function with callback!' . $abc . '<br>';
});



$k1 = 1;
$a1 = function() use (&$k1) {
    echo 'I aim anonymous function ' . $k1 .  '!<br>';
};

$k1++;
$a1();

echo '<br><br>';    

$arrow = fn()  => 'I am arrow function!' . $k1 . '<br>';
echo $arrow();

echo '<br><br>'; 

$farm = [
    [
        'name' => 'Cow',
        'sound' => 'Muuuu',
        'weight' => 500,
    ],
    [
        'name' => 'Pig',
        'sound' => 'Kra kra',
        'weight' => 100,
    ],
    [
        'name' => 'Chicken',
        'sound' => 'Cip cip',
        'weight' => 1,
    ],
    [
        'name' => 'Horse',
        'sound' => 'Iiiiiii',
        'weight' => 800,
    ],
    [
        'name' => 'Sheep',
        'sound' => 'Beeeee',
        'weight' => 200,
    ],
];

$weightPlus1 = array_map(function($animal) {
    $animal['weight'] += 1;
    return $animal;

}, $farm);

// $weightPlus1 = array_map(fn($animal)=> ($animal['weight'] + 1) && $animal, $farm);
array_walk($farm, fn(&$animal) => $animal['weight +1 '] = $animal['weight +1 '] + 1);

print_r($farm);

