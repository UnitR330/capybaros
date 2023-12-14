<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 10px;
    }
    .red-text {
      color: red;
    }
  </style>
</head>
<body>
</head>
<body>
  <?php
  $countGreaterThan150 = 0;
  
  for ($i = 0; $i < 300; $i++) {
    $randomNumber = rand(0, 300);
    echo $randomNumber;

    if ($randomNumber > 150) {
      $countGreaterThan150++;

      if ($randomNumber > 275) {
        echo '<span style="color: red;">';
      }
    }

    echo ' ';
/*
    if ($randomNumber > 275) {
      echo '</span>';
    }
    */
  }
  echo '<br>';
  echo 'Count of numbers bigger than 150: ' . $countGreaterThan150;
  ?>
</body>
</html>























