<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $count = count(array_filter($_POST));
    echo "<body style='background-color: white; color: black;'>";
    echo "Number of checked checkboxes: " . $count;
    echo "</body>";
    exit;
}

$checkboxes = '';
for ($i = 0; $i < rand(3, 10); $i++) {
    $checkboxes .= '<input type="checkbox" name="checkbox' . $i . '"> ' . chr(65 + $i) . '<br>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkbox Page</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <form method="post">
        <?php echo $checkboxes; ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
