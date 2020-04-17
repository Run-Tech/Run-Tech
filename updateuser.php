<?php
include 'session.php';

$username = $firstname = $middlename = $surname = $idnumber = $email = $phonenumber = $usertype = $password = "";

$from = $_GET['frm'];
echo "From: ".$from."<br/>";

if (isset($_GET['userid'])) {
    # code...
    $userid = $_GET['userid'];
    // echo "User ID: ".$userid." is type: ".$_POST['usertype'];
}
# if the register button is clicked
if (isset($_POST['submit']) && (isset($_POST['username']) || isset($_POST['password']))){

    echo $username;
    # prepare and bind
    $stmt = $conn->prepare("UPDATE user SET username=?, firstname=?, middlename=?, surname=?, password=?, idnumber=?, phone_number=?, email=?, type=? WHERE id ='".$userid."'");
    $stmt->bind_param("sssssssss", $username, $firstname, $middlename, $surname, $password,  $idnumber, $phonenumber, $email, $session_usertype);

    # set parameters and execute
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $idnumber = mysqli_real_escape_string($conn, $_POST['idnumber']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));

    if ($_POST['middlename'] === "") {
        $middlename = "not set";
    }else{
        $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    }

    $stmt->execute();
    echo "Records updated successfully";
    header("location: ".$from.".php");

    $stmt->close();
}
else
{
    echo "Problem area: ".mysqli_connnect_error();
}

$conn-> close();
?>