<?php
include('db_config.php');
session_start();

$user_check = $_SESSION['login_userQ'];

// //experiment
// if (isset($_GET['logged'])) {
// 	echo 'Logged on as '.$user_check;
// }

$users = $conn->query("SELECT * FROM user WHERE username='$user_check'");

if ($users->rowCount() <= 0) {
    # code...
	echo "Oops something is wrong<br>";
	echo "User: ".$user_check;
	alert("Oops, an error has occurred: #Sess");

} else {

    while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
        //Set the following details
        $_SESSION['mynames'] = $user["firstname"]." ".$user["middlename"];
        $_SESSION['mysurname'] = $user["surname"];
        $_SESSION['login_userQ'] = $user["username"];

        $session_userid = $user['id'];
		$session_username = $user['username'];
		$session_fname = $user['firstname'];
		if ($user['middlename'] === "") {
			$session_mname = "Not set";
		}else{
			$session_mname = $user['middlename'];
		}
		$session_surname = $user['surname'];
		$session_idnum = $user['idnumber'];
		$session_phone = $user['phone_number'];
		$session_email = $user['email'];
		$session_pro_pic = $user['profilepic'];
		$session_usertype = $user['type'];
		$user_admin = "21232f297a57a5a743894a0e4a801fc3";
		$user_client = "62608e08adc29a8d6dbc9754e659f125";
	}
}

if(!isset($_SESSION['login_userQ'])){
    header("location:mylogin.php");
}
?>