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
?>