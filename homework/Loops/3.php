<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 
    Print on one line all numbers from 1 to a random number between 3000 - 4000 
    eg(set from 1 to 3476) that are divisible by 77 without remainder. Separate 
    numbers with commas. There must be no comma after the last number. If necessary, 
    use css to make all results visible on the screen.
   -->
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
