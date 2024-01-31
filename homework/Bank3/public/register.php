<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;

$database = new DataBaseClass();

include '../views/register_temp.php';

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'];
    $personalCode = $_POST['personalCode'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($firstName) && !empty($lastName) && !empty($personalCode) && !empty($email) && !empty($password)) {
        if (strlen($firstName) < 3 || strlen($lastName) < 3) {
            $error = 'Error: First and last name must be at least 3 characters long.';
        } elseif (strlen($personalCode) !== 11 || !is_numeric($personalCode)) {
            $error = 'Error: Invalid personal code.';
        } else {
            $userData = (object)[
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'personalCode' => $personalCode,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ];
            $userId = $database->createUser($userData);

             if ($userId) {
                $successMessage = $firstName . ': your account created successfully! User ID: ' . $userId;
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 15000);  
                      </script>';
              
            } else {
               $error = 'Error creating user. Please try again.';
          }
        }
    } else {
        $error = "All fields are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
   
</head>
<body>
 
    <h1>Register</h1>
    <?php
     if (!empty($error)) {
         echo '<div class="error">' . $error . '</div>';
     } elseif (!empty($successMessage)) {
         echo '<div class="success">' . $successMessage . ' Redirecting to main page in <span id="countdown">15</span> seconds...</div>';
     }
     ?>
   
    <div class="form-center">
    <?php
        if (empty($successMessage)) {
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required placeholder="Enter your first name"><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required placeholder="Enter your last name"><br>

            <label for="personalCode">Personal Code:</label>
            <input type="text" id="personalCode" name="personalCode" required placeholder="Enter your personal code"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email"><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password"><br>

            <label for="confirmPassword">Repeat your password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Repeat your password"><br>

            <button type="submit" value="Register">Register</button>
        </form>
        <?php } ?>
    </div>
    <script>
        var countdownElement = document.getElementById('countdown');
        var seconds = 15;

        function updateCountdown() {
            countdownElement.textContent = seconds;
            if (seconds === 0) {
                window.location.href = "index.php";
            } else {
                seconds--;
                setTimeout(updateCountdown, 1000);
            }
        }
        updateCountdown();
    </script>

</body>
</html>
