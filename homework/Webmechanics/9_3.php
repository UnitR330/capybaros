<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $count = count(array_filter($_POST));
    $_SESSION['count'] = $count;
    header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/9_3.php');
    exit;
}

if (isset($_SESSION['count'])) {
    echo "<body style='background-color: white; color: black;'>";
    echo "Number of checked checkboxes: " . $_SESSION['count'];
    echo "</body>";
    unset($_SESSION['count']);
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
    <title>Checkboxes</title>
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
