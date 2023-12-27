<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: blue;
    }
  </style>
</head>
<body>
  <a href="5red.php">Go to red.php</a>
  <?php
    if (isset($_GET['redirect'])) {
        header('Location: 5red.php');
        exit();
    }
  ?>
</body>
</html>
