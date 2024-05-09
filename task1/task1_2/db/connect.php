<?php 
$host ="localhost";
$username = "root";
$password = "";
$dbname = "bills";

$connect = new mysqli($host, $username, $password, $dbname);

if($connect -> connect_error){
    die("disconnect". $connect->connect_error);
}
// echo "Connected<br>";
?>