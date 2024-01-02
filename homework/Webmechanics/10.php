<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $generatedCount = $_SESSION['generatedCount'];
    $checkedCount = count(array_filter($_POST));
    $_SESSION['checkedCount'] = $checkedCount;

    echo "<style>body {background-color: white; color: black;}</style>";
    
    echo '<h1 style="color: lightgreen;">Number of checked boxes: ' . $checkedCount . '</h1>';
    echo '<h1 style="color: lightgreen;">Total number of generated boxes: ' . $generatedCount . '</h1>';
    echo '<a href="' . $_SERVER['PHP_SELF'] . '">BACK</a>';  
    unset($_SESSION['generatedCount']);
    exit;
}

$boxes = '';
$generatedCount = rand(3, 10);
$_SESSION['generatedCount'] = $generatedCount;

$boxes .= '<div style="display: inline-block;">';
for ($i = 0; $i < $generatedCount; $i++) {
    $boxes .= '<input type="checkbox" name="checkbox' . $i . '"> ' . chr(65 + $i) . ' ';
}
$boxes .= '</div>';
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
        <?php echo $boxes; ?>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
