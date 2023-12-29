<!-- 
Make a page with two buttons. Place the buttons in two different forms - one GET 
and the other POST. Without using any specific $_GET or $_POST values, color the 
background green when the button is pressed from a GET form and yellow when from 
a POST form. 
Add code that would redirect the browser to the same address (i.e. to itself) after 
the POST method already using the GET method. 
-->

<?php
$color = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = "yellow";
    header("Location: " . $_SERVER['REQUEST_URI']); // This will redirect to the same page
    exit();
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

    <form action="" method="get">
        <input type="submit" value="GET Form Button">
    </form>

    <form action="" method="post">
        <input type="submit" value="POST Form Button">
    </form>
</body>
</html>
