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
        $_SESSION['user'] = ["username"=>$username,"email"=>$email,"user_id"=> $user->insert_id];
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
    $username = "";
    $user_id = 0;

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        $_SESSION['user'] = [
            "username" => $row['username'],
            "email" => $row['email'],
            "user_id"  => $row['id'],
        ];

        header("Location: /myquery-php");
        exit();
}
}
else if(isset($_GET['logout'])){
    session_unset();
    header("Location: /myquery-php");
}
else if(isset($_POST['ask'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];
    // print_r($_SESSION);
    // exit();
    $question = $conn->prepare(
    "INSERT INTO `questions`
    (`id`, `title`, `description`, `category_id`, `user_id`) 
    VALUES (NULL,'$title', '$description', '$category_id', '$user_id');"
    );
    
        $result = $question->execute();

    
        if($result){
        header("Location: /myquery-php");
        exit(); 
        }   
        else{
            echo "Question is added to the website";
        }
}
else if(isset($_POST['answer'])){
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];
    // print_r($_SESSION);
    // exit();
    $query = $conn->prepare(
    "INSERT INTO `answers`
    (`id`, `answer`, `question_id`, `user_id`) 
    VALUES (NULL,'$answer','$question_id', '$user_id');"
    );
    
        $result = $query->execute();
    
        if($result){
        header("Location: /myquery-php?q-id=$question_id");
        exit(); 
        }   
        else{
            echo "Answer is not submitted";
        }
}
?>