<?php
include 'session.php';

if(session_destroy()) {
    header("Location: mylogin.php?orig=".md5('php'));
    die();
}
?>