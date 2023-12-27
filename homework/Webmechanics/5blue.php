<?php
// PHP code for redirection
if(isset($_GET['redirect']) && $_GET['redirect'] == 'red') {
    header("Location: 5red.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Page</title>
    <style>
        body {
            background-color: #3498db; /* Blue color */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Blue Page!</h1>
    <p>Click the link below to stay on the Blue Page:</p>
    <a href="<?php echo $_SERVER['PHP_SELF'] . '?redirect=red'; ?>">Stay on Blue Page</a>
</body>
</html>
