<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;

$database = new DataBaseClass();

include '../views/template.php';

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    echo '<div>You are authenticated</div>';
} else {
    echo '<div>Welcome to the Home Page!</div>';
}


// if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
//     echo '<div><a href="../views/auth/logout.php">Logout</a></div>';
// } else {
    //     echo '<div><a href="../views/auth/login.php">Login</a></div>';
    
// }
// // Add a check for authentication
    ?>