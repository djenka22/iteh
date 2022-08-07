<?php 
$host = "localhost";
$db = "iteh";
$user = "root";
$password = "";

$conn = new mysqli($host,$user,$password,$db);

if($conn) {
    echo "Hello";
}

if ($conn->connect_errno) {
    exit ("Connection failure: error ".conn->connect_error);
    
}

?>