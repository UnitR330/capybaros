<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom background color by input</title>

    <!-- 
     Create a page similar to previous, but don't make the second link with the 
     transferred variable, but instead, if you manually enter the GET variable 
     color with the RGB color code (for example color=ff1234) in the URL line,  
     press "Enter" and background color of the page will become this color.
    -->

    <style>
        body {
            <?php
            $color = isset($_GET['color']) ? '#' . $_GET['color'] : 'black';
            ?>
            background-color: <?= $color ?>;
            color: white;
            text-align: center;
            padding: 50px;
            margin-top: 40px;
        }

        a {
            color: white;
            text-decoration: none;
            margin: 40px;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        input {
            margin-top: 20px;
            padding: 5px;
        }
        
        form {
            margin-top: 20px;
        }

    </style>
</head>
<body>

<a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/3.php">Black Background</a>

<form method="get" action="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/3.php">
    <label for="customColor">Enter custom color here:</label>
    <input type="text" id="customColor" name="color" placeholder="e.g., ff1234" value="<?= isset($_GET['color']) ? $_GET['color'] : '' ?>">
    <button type="submit">Apply custom color</button>
</form>

</body>
</html>
