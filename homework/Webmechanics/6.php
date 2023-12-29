<?php
$color = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = "yellow";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $color = "green";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>

<!-- 
Make a page with two buttons. Place the buttons in two different forms - one GET 
and the other POST. Without using any specific $_GET or $_POST values, color the 
background green when the button is pressed from a GET form and yellow when from 
a POST form.

 -->
    <form action="" method="get">
        <input type="submit" value="GET Green">
    </form>

    <form action="" method="post">
        <input type="submit" value="POST Yellow">
    </form>
</body>
</html>
