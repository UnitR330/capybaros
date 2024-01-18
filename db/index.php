<?php

$host = '127.0.0.1';
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


// SELECT column1, column2 ...
// FROM table_name;

$sql = "
    SELECT id, name, height, type
    FROM trees
    -- WHERE height > height / 2
    -- ORDER BY height DESC
    -- LIMIT 0, 3
    ";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

// SELECT AVG(column_name)
// FROM table_name
// WHERE condition

$sql = "
    SELECT AVG(height) as average
    FROM trees 
    "

$stmt = $pdo->query($sql);

$average = $stmt->(fetch);

// echo '<pre>';
// print_r($trees);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Crud Trees</title>
<style>
        body {
            font-family: Arial, Helvetica; 

        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
       
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
       
        tr:hover {
            background-color: #f5f5f5;
        }
       
        th {
            background-color: #4CAF50;
            color: white;
        }

        .forms {
            margin-top: 20px;
            display: flex;
        }
        .forms form {
            width: 33%;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            box-shadow: 0 0 5px #ccc;
            box-sizing: border-box;
        }
        .forms form input .forms form select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .forms form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
       
</head>
<body>
    <h1>Trees</h1>
    <h2>Average height: <?= $stat['average'] ?> m </h2>
    <h2>Total trees: <?= $stat['count'] ?></h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Height</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trees as $tree) : ?>
                <tr>
                    <td><?php echo $tree['id']; ?></td>
                    <td><?php echo $tree['name']; ?></td>
                    <td><?php echo $tree['height']; ?></td>
                    <td><?php echo $tree['type']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
            <h2>CUT A TREE</h2>
    </div>
</body>
</html>





















