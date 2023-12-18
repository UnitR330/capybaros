<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nail Driving Simulation</title>
</head>
<body>

<?php

function smallBlow() {
    return rand(5, 20);
}

function bigHit() {
    $depth = rand(20, 30);
    $missChance = rand(0, 1); // 0 or 1, representing 50% chance
    return $missChance ? 0 : $depth;
}

function driveNails($blowFunction, $nailLength, $numNails) {
    $nailsDriven = 0;
    $totalStrokes = 0;

    while ($nailsDriven < $numNails) {
        $penetration = $blowFunction();
        $totalStrokes++;

        $nailLength -= $penetration;

        if ($nailLength <= 0) {
            $nailsDriven++;
            $nailLength = 8.5; // Reset nail length for the next nail
        }
    }

    return $totalStrokes;
}

// Drive 5 nails with small blows
$smallBlowStrokes = driveNails('smallBlow', 8.5, 5);

// Drive 5 nails with big hits
$bigHitStrokes = driveNails('bigHit', 8.5, 5);

echo "<p>Small blow strokes needed: $smallBlowStrokes</p>";
echo "<p>Big hit strokes needed: $bigHitStrokes</p>";

?>

</body>
</html>
