<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nailing</title>
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
