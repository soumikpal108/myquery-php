<?php
session_start();
include("../common/db.php");
if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare(
    "INSERT INTO `users`
    (`id`, `username`, `email`, `password`, `address`) 
    VALUES (NULL,'$username', '$email', '$password', '$address');"
    );
    
        $result = $user->execute();
    
        if($result){
        $_SESSION['user'] = ["username"=>$username,"email"=>$email];
        // Correct redirect syntax:
        header("Location: /myquery-php");
        exit(); // Always call exit() after a redirect to stop script execution
        }   
        else{
            echo "New user not registered";
        }
}
else if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        $_SESSION['user'] = [
            "username" => $row['username'],
            "email" => $row['email']
        ];

        header("Location: /myquery-php");
        exit();
}
}
else if(isset($_GET['logout'])){
    session_unset();
    header("Location: /myquery-php");
}
?>