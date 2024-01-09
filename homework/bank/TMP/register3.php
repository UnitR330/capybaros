<?php
$isValidName = true;
$isValidPassword = true;
$errorMsgName = '';
$nameExists = '';
$errorMsgPassword = '';
$nameExistsScript = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat_password"];

    $existingUsers = json_decode(file_get_contents('./data/users.ser'), true);

    if (strlen($username) < 2 || strlen($username) > 20) {
        $isValidName = false;
        $errorMsgName = 'Name should consist of 2 to 20 characters.';
    } elseif (isset($existingUsers[$username])) {
        $isValidName = false;
        $nameExists = 'Username already exists. Please choose a different one.';
        $nameExistsScript = '<script>displayErrorMessage("error-name-exists", "' . $nameExists . '");</script>';
    } elseif ($password !== $repeatPassword) {
        $isValidPassword = false;
        $errorMsgPassword = 'Passwords do not match.';
    } elseif ($isValidName && $isValidPassword) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $existingUsers[$username] = [
            'password' => $hashedPassword,
            'email' => $_POST['email'],
        ];

        file_put_contents('./data/users.ser', json_encode($existingUsers));

        header('Location: success.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/css/register.css">
</head>
<body>
    <div id="bg-wrap">
    </div>
    <form action="register.php" method="POST" onsubmit="return validateForm()">
        <?php echo $nameExistsScript; ?>
        <h1> Registration Form<img id="logo" src="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/images/logo_1.png" alt="Logo"></h1>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter your username" value="<?php echo htmlspecialchars($isValidName && isset($_POST['username']) ? $_POST['username'] : ''); ?>" <?php echo $isValidName ? 'required' : ''; ?> oninput="hideErrorMessage('error-message-name')">
        <div class="error-message" id="error-message-name"><?php echo $errorMsgName; ?></div>
        <br>
        <div class="name-exists" id="error-name-exists"><?php echo $nameExists; ?></div>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your personal email " required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <div class="error-message" id="error-message-password"><?php echo $errorMsgPassword; ?></div>
        <br>
        <label for="repeat_password">Repeat Password:</label>
        <input type="password" name="repeat_password" placeholder="Repeat your password" required>
        <br>
        <a href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/registered_to_base.php">
            <button id="register-btn" type="submit" href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/register_to_base.php">Register</button>
        </a>
        <a href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/index.php">
            <button id="return-btn" type="button">Return</button>
        </a>
    </form>

    <script>
        function validateForm() {
            var username = document.getElementsByName('username')[0].value;
            var password = document.getElementsByName('password')[0].value;
            var repeatPassword = document.getElementsByName('repeat_password')[0].value;

            // Check if the PHP variable is set and not empty
            if (typeof nameExists !== 'undefined' && nameExists !== '') {
                displayErrorMessage('error-name-exists', nameExists);
                return false;
            } 
            if (username.length < 2 || username.length > 20) {
            displayErrorMessage('error-message-name', 'Name should consist 2 - 20 characters.')
            return false;
            }
            // Validate the "Password" field
            if (password !== repeatPassword) {
            displayErrorMessage('error-message-password', 'Passwords do not match.');
            return false;
            }
            return true;
        }

        function displayErrorMessage(elementId, message) {
            var errorMessage = document.getElementById(elementId);
            errorMessage.innerHTML = message;
            errorMessage.style.display = 'block';
            setTimeout(function () {
                errorMessage.style.display = 'none';
            }, 5000);
        }

        function hideErrorMessage(elementId) {
            var errorMessage = document.getElementById(elementId);
            errorMessage.style.display = 'none';
        }
    </script>
</body>
</html>