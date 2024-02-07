<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;800&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
include "connect.php"; 
include "header-reg.php";
$UserID = $_COOKIE['user'];

?>

<body>
    <?php
echo "<h2 id='welcome_line'>" . 'Добро Пожаловать, ' . $UserID . "</h2>";
    ?>
</body>
</html>