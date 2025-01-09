<?php
session_start();
include ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>
        <h1 style="text-align: center justify-content: center;">
            MUKODIK VEGRE

            <?php
            
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email = '$email'");
                while ($row = mysqli_fetch_array($query)){
                    echo $row['name'];
                }
            }
            ?>
        </h1>
        <a href="logout.php">Kijelentkezés</a>
    </div>

</body>
</html>