<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square Drawing</title>
    <style>
        .square {
            font-family: monospace;
            font-size: 20px; 
            line-height: 20px;  
            white-space: pre;
        }

        .red {
            color: red;
        }
    </style>
</head>
<body>

<?php

function generateSequence($start, $length, $step) {
    $sequence = [];

    for ($i = 0; $i < $length; $i++) {
        $sequence[] = $start + $i * $step;
    }

    return $sequence;
}

function drawSquare($sideLength, $redIndices)
{
    for ($i = 0; $i < $sideLength; $i++) {
        echo '<div class="square">' . makeRow($sideLength, $i, $redIndices) . '</div>';
    }
}

function makeRow($sideLength, $rowIndex, $redIndices)
{
    $row = '';
    for ($j = 0; $j < $sideLength; $j++) {
        $element = '* ';

        if (in_array($rowIndex * $sideLength + $j, $redIndices)) {
            $element = '<span class="red">' . $element . '</span>';
        }

        $row .= $element;
    }

    return $row;
}

 
$sideLength = 30;  
 
$redIndices = generateSequence(0, $sideLength, $sideLength + 1);

drawSquare($sideLength, $redIndices);

?>

</body>
</html>
