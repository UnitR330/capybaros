

<?php
// Generate a random number of checkboxes
$randomAmount = rand(3, 10);
$checkboxes = '';
for ($i = 0; $i < $randomAmount; $i++) {
    $checkboxes .= '<input type="checkbox" name="checkbox' . $i . '"> ' . chr(65 + $i) . '<br>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkbox Page</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form').on('submit', function(e) {
                e.preventDefault();
                var count = $('input[type="checkbox"]:checked').length;
                $('body').css('background-color', 'white');
                $('body').css('color', 'black');
                $('#form').hide();
                $('#result').text('Number of checked checkboxes: ' + count);
            });
        });
    </script>
</head>
<body>
    <form id="form" method="post">
        <?php echo $checkboxes; ?>
        <input type="submit" value="Submit">
    </form>
    <p id="result"></p>
</body>
</html>
