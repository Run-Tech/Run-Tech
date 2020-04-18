<?php
include 'db_config.php';

$name = $surname = $idnumber = $phonenumber = $email = $grade = $location = $codinglevel = $sessionday = "";

# if the register button is clicked
if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['idnumber']) && isset($_POST['phonenumber']) && isset($_POST['location'])){

    # prepare and bind
    $stmt = $conn->prepare("CALL new_enquiry(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $surname, $idnumber, $phonenumber, $email, $grade, $location, $codinglevel, $sessionday);

    # set parameters and execute
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $idnumber = mysqli_real_escape_string($conn, $_POST['idnumber']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $codinglevel = mysqli_real_escape_string($conn, $_POST['codinglevel']);
    $sessionday = mysqli_real_escape_string($conn, $_POST['sessionday']);

    $stmt->execute();
    //echo "New records created successfully"."</br> <a href='enquire.php'>Go back</a>";
    header("location: thanks.html");

    $stmt->close();
}
else
{
    header("location: enquire.php?fail");
    //echo "Problem area: ".mysqli_connnect_error();
}

$conn-> close();
?>