<?php

include 'session.php';

if (isset($_POST['text'])) {

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_errno());
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO announcement (announcer, announcement, date_time) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $session_userid, $text, $timedate);

    // set parameters and execute
    $text = $_POST['text'];
    $timedate = date('Y-m-d H:i:s');

    $stmt->execute();

    echo "New records created successfully";
    header("location:announcement.php#go");

    $stmt->close();
}
else{
    echo "Something went wrong here, type something in the textarea please.";
}

$conn->close();

?>

