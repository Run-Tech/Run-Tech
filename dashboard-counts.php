<?php
include 'session.php';

$resultset1 = mysqli_query($conn,"select count(*) from user where user;");

$rows1 = mysqli_fetch_array($results,MYSQLI_ASSOC);

echo "Row1: ".$rows1['count()'];
?>
