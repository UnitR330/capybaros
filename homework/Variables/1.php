<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculation</title>

</head>
<body>

    <script>
    /*
Create 4 variables to store your first name, last name, year of birth and 
this year (not necessarily real). Write code that calculates your age based 
on your year of birth and prints the following sentence using the first and 
last name variables:
"I am 'Name' 'Surname'. I am XX year(s)".
*/
    </script>
<?php
    
$Name = "Unit";
$Surname = "R330";
$yearOfBirth = 1980;  
$currentYear = 2023;  

$age = $currentYear - $yearOfBirth;

echo "I am " . $Name . " " . $Surname . ". I am " . $age . " year(s)."; 
    
  
?>

</body>
</html>
