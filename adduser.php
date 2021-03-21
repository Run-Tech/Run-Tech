<?php
include 'db_config.php';

$username = $firstname = $middlename = $surname = $idnumber = $email = $phonenumber = $password = "";

$from = $_GET['frm'];
echo "From: ".$from."<br/>";

# if the register button is clicked
if (isset($_POST['submit']) && (isset($_POST['username']) || isset($_POST['password']))){

    # prepare and bind
    $stmt = $conn->prepare("CALL new_user(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $firstname, $middlename, $surname, $password,  $idnumber, $phonenumber, $email);

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
    //echo "New records created successfully";
    header("location: ".$from.".php?done");

    $stmt->close();
}
else
{
    header("location: ".$from.".php?fail");
    //echo "Problem area: ".mysqli_connnect_error();
}

$conn-> close();
?>