<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
       
      font-size: 10px;
    }
  </style>
</head>
<body>
  <?php
  $numAsterisks = 400;
  $asterisksPerLine = 50;
  
  for ($i = 0; $i < $numAsterisks; $i++) {
    echo '*';
    
    if (($i + 1) % $asterisksPerLine === 0) {
      echo PHP_EOL;
    }
  }
  ?>
</body>
</html>
