<?php
$host = "localhost";
$username = "root";
$password = null;
$db = "myquery";

$conn = new mysqli($host,$username,$password,$db);

if($conn->connect_errno){
    die("Not connected with db".$conn->connect_errno);
}
echo "db connected";
?>