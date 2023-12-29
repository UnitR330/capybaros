<?php
// PHP code for redirection
if(isset($_GET['redirect']) && $_GET['redirect'] == 'blue') {
    header("Location: http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/5_1blue.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Page</title>
    <style>
        body {
            background-color: #e74c3c; /* Red color */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Red Page!</h1>
    <p>Click the link below to stay on the Red Page:</p>
    <a href="<?php echo $_SERVER['PHP_SELF'] . '?redirect=blue'; ?>" style= "color: black">Stay on Red Page</a>
</body>
</html>
