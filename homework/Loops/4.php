<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .square {
      font-size: 10px;  
    }
  </style>
</head>
<body>
  <div class="square">
    <?php
      for ($i = 0; $i < 10; $i++) {
        echo str_repeat('* ', 10) . '<br>';
      }
    ?>
  </div>
</body>
</html>
