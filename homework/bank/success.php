<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization success</title>
    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/css/success.css">
</head>
<body>

<?php
    // Generate a random number between 100 and 300
    $randomNumber = rand(100, 300);
?>

<div class="success-message">
        <h1>Thank you for choosing our bank! As a compliment you receive <?php echo $randomNumber; ?> €!</h1>
        <h1>These funds will be available immediately upon your first login.</h1>
        <!-- <h1>Check your e-mail and follow the link to enable all the features of your personal account</h1> -->
        <br>
        <h2>You will be redirected to the main page in <span id="countdown">10</span> seconds.</h2>
    </div>

<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">€</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❆</div>
  <div class="snowflake">zł</div>
  <div class="snowflake">❄</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❄</div>
  <div class="snowflake">£</div>
  <div class="snowflake">❆</div>
  <div class="snowflake">❄</div>
  <div class="snowflake">❅</div>

</div>

<script>
    let countdownElement = document.getElementById('countdown');
    let countdownValue = 15;

    function updateCountdown() {
        countdownElement.textContent = countdownValue;
        countdownValue--;

        if (countdownValue < 0) {
            window.location.href = 'http://localhost:8080/_46-grupe_/capybaros/homework/bank/index.php';
        } else {
            setTimeout(updateCountdown, 1000);
        }
    }
    updateCountdown();

</script>
<script>
</script>
</body>
</html>
