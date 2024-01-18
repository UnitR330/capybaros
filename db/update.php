<?php

$host = 'localhost';
$db   = 'forest';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);


// DELETE FROM table_

$id = $_POST['id'];

$height = $_POST['height'];

$sql = "
    UPDATE trees
    SET height = :h
    WHERE id = :id
";

 
$stmt->execute([
    'id' => $id,
    'height' => $height
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="forms">
      <form action="http://localhost/capybaros/db/store.php" method="post">
          <h2>Plant a tree</h2>
          <input type="text" name="name" placeholder="Name">
          <input type="text" name="height" placeholder="Height">
          <select name="type">
              <option value="0">Pasirinkti</option>
              <option value="lapuotis">Lapuotis</option>
              <option value="spygliuotis">Spygliuotis</option>
              <option value="palmė">Palmė</option>
            </select>    
            <input type="text" name="type" placeholder="Type">
            <button type="submit">Plant Tree</button>
        </form>
        <form action="http://localhost/capybaros/db/store.php" method="post">
          <h2>Cut a tree</h2>
        </form>
        <form action="http://localhost/capybaros/db/store.php" method="post">
          <h2>Grow a tree</h2>
        </form>

        