
<!-- 
Create two pages lemon.php and orange.php. Color their backgrounds in the appropriate 
colors. Add code to the lemon.php page that will always redirect the browser to the 
orange.php page. Demonstrate performance.
 -->

<?php
    header('Location: 4orange.php');
    exit;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lemon Page</title>
    <style>
        body {
            background-color: #FDE74C; /* Lemon color */
        }
    </style>
</head>
<body>
</body>
</html>
