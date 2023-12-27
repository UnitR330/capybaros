<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: red;
    }
  </style>
</head>
<body>
  <a href="5red.php">Go to blue.php</a>
  <?php
    if (isset($_GET['redirect'])) {
        header('Location: 5blue.php');
        exit();
    }
  ?>
</body>
</html>
