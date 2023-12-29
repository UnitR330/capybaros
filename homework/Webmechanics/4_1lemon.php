<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lemon Page</title>
    <style>
        body {
            background-color: lemonchiffon;
            color: black;
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>

<!-- 
Create two pages lemon.php and orange.php. Color their backgrounds in the appropriate 
colors. Add code to the lemon.php page that will always redirect the browser to the 
orange.php page. Demonstrate performance.
 -->
<button onclick="redirectToOrange()">Go to Orange</button>

<script>
    function redirectToOrange() {
        window.location.href = 'http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/4orange.php';
    }

</script>

</body>
</html>
