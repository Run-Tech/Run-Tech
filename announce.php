<?php

include 'session.php';

$text = $_POST['text'];
$timedate = date('Y-m-d H:i:s');

if (empty($text)) {
    header("location: announcement.php?err1");
    die();
} else {
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO announcement (announcer, announcement, date_time) VALUES (?, ?, ?)");
    $res=$stmt->execute([$session_userid, $text, $timedate]);

    // echo "New records created successfully";
    if ($res)
        header("location:announcement.php#go");
    else
        header("location:announcement.php#no");
    die();
    $conn = null;
    exit;
}
?>

