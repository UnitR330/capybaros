<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom background color</title>

 <!-- 
     Create a page similar to previous, but don't make the second link with the 
     transferred variable, but instead, if you manually enter the GET variable 
     color with the RGB color code (for example color=ff1234) in the URL line,  
     press "Enter" and background color of the page will become this color.
  -->

    <style>
        body {
            <?php 
            $color = isset($_GET['color']) ?  '#' . $_GET['color'] : 'black';
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

<a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/2.php">Black Background</a>
<a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/2.php?color=ff1234">Your Custom Background</a>

</body>
</html>
