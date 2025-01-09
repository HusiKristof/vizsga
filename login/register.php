<?php 
include 'connect.php';

if (isset($_POST['signUp'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn -> query($checkEmail);
    if ($result -> num_rows > 0){
        echo "Ez az E-mail már használatban van!";
    }
    else {
        $insertQuery = "INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Hiba a regisztráció során: ". $conn->error;
        }
    }

    if ($conn->query($sql) === TRUE) {
        echo "Sikeres regisztráció";
    } else {
        echo "<script>alert('Hiba a regisztráció során: ')</script>". $conn->error;
    }
}

if (isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result -> fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: homepage.php");
    } else {
        echo "<script>alert('Hibás E-mail cím vagy jelszó!')</script>";
    }
}
?>