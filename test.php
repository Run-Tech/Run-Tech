<?php

require 'db_config.php';

$myusername = 'koketso';
$mypassword = md5('koketso');

$users = $conn->query("SELECT * FROM user WHERE username='$myusername' AND password='$mypassword' ORDER BY id");

if ($users->rowCount() <= 0) {
    # code...
    echo "Incorrect\n".$users['id'];

} else {

    while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
        //Set the following details
        $_SESSION['mynames'] = $user["firstname"]." ".$user["middlename"];
        $_SESSION['mysurname'] = $user["surname"];
        $_SESSION['login_userQ'] = $user["username"];

        echo $_SESSION['login_userQ']." logged in, going to: ".$_SERVER['HTTP_HOST'];
        header('location: '.$_SERVER['HTTP_HOST'].'/profile.php');
    }
}

?>
