<?php
include('db_config.php');
session_start();

$user_check = $_SESSION['login_user'];

$results = mysqli_query($conn,"select * from user where user.username = '$user_check' ");

$row = mysqli_fetch_array($results,MYSQLI_ASSOC);

$session_userid = $row['id'];
$session_username = $row['username'];
$session_username = $row['password'];
$session_person = $row['person'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
?>