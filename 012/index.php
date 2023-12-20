<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<pre>
<h1>Hello WEB mechanics!</h1>

    <a href="http://localhost:8080/_46-grupe_/capybaros/012/?kas=kazkas">Link 1</a>
    <a href="http://localhost:8080/_46-grupe_/capybaros/012/?kas=kitas">Link 2</a>
    <a href="http://localhost:8080/_46-grupe_/capybaros/012/?kas=kitas&kitas=dalikas">Link 3</a>

<?php


print_r($_GET);
print_r($_POST);
print_r($_SERVER['REQUEST_METHOD']);


if (($_GET['kas'] ?? '') == 'kazkas')  {
    echo '<h2>Labas, kazkas!</h2>';
}
if (($_GET['kas'] ?? '') == 'kitas')  {
    echo '<h2>Labas, kitas!</h2>';
}

?>
<form action="http://localhost:8080/_46-grupe_/capybaros/012/" method="get">
    <input type="text" name="kas">
    <input type="color" name="kitas">
    <input type="hidden" name="a" value="5">
    <button type="submit">GET IT</button>
</form>

<form action="http://localhost:8080/_46-grupe_/capybaros/012/?z=88" method="post">
    <input type="text" name="kas">
    <input type="color" name="kitas">
    <input type="hidden" name="a" value="5">
    <button type="submit">POST IT</button>
</form>

</pre>

</body>
</html>
    
    



// Query
// Body
// Params