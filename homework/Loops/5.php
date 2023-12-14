<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square Drawing</title>
    <style>
        .square {
            font-family: monospace;
            font-size: 20px; /* Adjust as needed */
            line-height: 20px; /* Adjust as needed */
            white-space: pre;
        }

        .red {
            color: red;
        }
    </style>
</head>
<body>

<?php

function generateSequence($start, $length) {
    $sequence = [];

    for ($i = 0; $i < $length; $i++) {
        $sequence[] = $start + $i * 11;
    }

    return $sequence;
}

function drawSquare($sideLength, $redIndices)
{
    // Draw each row of the square
    for ($i = 0; $i < $sideLength; $i++) {
        echo '<div class="square">' . makeRow($sideLength, $i, $redIndices) . '</div>';
    }
}

function makeRow($sideLength, $rowIndex, $redIndices)
{
    $row = '';
    for ($j = 0; $j < $sideLength; $j++) {
        $element = '*';

        // Check if the current element should be red based on the indices
        if (in_array($rowIndex * $sideLength + $j, $redIndices)) {
            $element = '<span class="red">' . $element . '</span>';
        }

        $row .= $element;
    }

    return $row;
}

// Specify the side length of the square (10 in this case)
$sideLength = 10;

// Generate red indices using the function
$redIndices = generateSequence(0, 10);

// Call the function to draw the square with red elements
drawSquare($sideLength, $redIndices);

?>

</body>
</html>
