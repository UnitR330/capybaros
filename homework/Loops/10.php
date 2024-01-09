<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 10 hammering</title>
    <!-- 
    Model nailing. Model the penetration depth using the rand() function. The length 
    of the nail is 8.5 cm (it sinks completely into the board).
    "Drive" 5 nails with small blows. One blow drives a nail 5-20 mm. Count how many strokes are needed.
    "Drive" 5 nails with big hits. One hit drives the nail 20-30mm, but there is a 50% chance 
    (use the rand() function to model the probability) that the hit misses the nail. Count how many 
    strokes are needed.
     -->
</head>
<body>

<?php

function smallHit() {
    return rand(5, 20);
}

function bigHit() {
    $depth = rand(20, 30);
    $missChance = rand(0, 1);  
    return $missChance ? 0 : $depth;
}

function pushNails($hitFunction, $nailLength, $numNails) {
    $nailsGoDown = 0;
    $totalHits = 0;

    while ($nailsGoDown < $numNails) {
        $penetration = $hitFunction();
        $totalHits++;

        $nailLength -= $penetration;

        if ($nailLength <= 0) {
            $nailsGoDown++;
            $nailLength = 8.5; 
        }
    }

    return $totalHits;
}

$smallHits = pushNails('smallHit', 8.5, 5);

$bigHits = pushNails('bigHit', 8.5, 5);

echo "<p>Small hits needed: $smallHits</p>";
echo "<p>Big hits needed: $bigHits</p>";

?>

</body>
</html>
