<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red backgrund page</title>
<!-- 
    Create a page with a black background and two links to yourself. One link with the 
    file name and another link with the file name and the color=1 variable passed in 
    the GET data transfer method. Make the background red when clicked on a link with 
    a passed variable, and back to black when clicked on a link without a passed variable.
 -->

    <style>
        body {

            <?php
            $color = isset($_GET['color']) ? 'red' : 'black';
            ?>
            background-color: <?= $color ?>;
            color: white;
            text-align: center;
            padding: 50px;
        }

        a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/1.php">Black Background</a>
<a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/1.php?color=1">Red Background</a>

</body>
</html>
