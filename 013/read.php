<?php
session_start();

echo $_SESSION['my_session'];
echo '<br>';
echo $_SESSION['logged'];
echo '<br>';
if ($_SESSION['log_time'] < time() - 10) {
    echo 'Session closed';
} 
else { 
    echo 'Session open!';
}

echo '<br>';
echo $_COOKIE['my_donuts'];

?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 