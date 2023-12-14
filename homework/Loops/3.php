<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      width: 80%; 
       
    }
  </style>
</head>
<body>
  <?php
  $randomNumber = rand(3000, 4000);

  $divideBy77 = [];

  for ($i = 1; $i <= $randomNumber; $i++) {
    if ($i % 77 === 0) {
      $divideBy77[] = $i;
    }
  }

  echo implode(', ', $divideBy77);
  ?>
</body>
</html>
