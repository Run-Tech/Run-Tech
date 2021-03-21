<?php
include 'session.php';

$doc_name = $doc_size = $doc_type = $doc_mod_date = $doc_owner = $doc_access = "";

# if the register button is clicked
if (isset($_GET['doc_name']) && isset($_GET['doc_size']) && isset($_GET['doc_type']) && isset($_GET['doc_mod_date']) && isset($_GET['doc_owner']) && isset($_GET['doc_access'])){

    # prepare and bind
    $stmt = $conn->prepare("CALL new_document(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $doc_name, $doc_size, $doc_type, $doc_mod_date, $doc_owner, $doc_access);

    # set parameters and execute
    $doc_name = mysqli_real_escape_string($conn, $_GET['doc_name']);
    $doc_size = mysqli_real_escape_string($conn, $_GET['doc_size']);
    $doc_type = mysqli_real_escape_string($conn, $_GET['doc_type']);
    $doc_mod_date = date('Y-m-d H:i:s');
    $doc_owner = mysqli_real_escape_string($conn, $_GET['doc_owner']);
    $doc_access = mysqli_real_escape_string($conn, $_GET['doc_access']);
    
    $stmt->execute();
    //echo "A new document record created successfully";
    header("location: manage-files.php?set&name=$doc_name&size=$doc_size");

    $stmt->close();
}
else
{
    header("location: manage-files.php?fail");
    // echo "Problem area: ".mysqli_connnect_error();
}

$conn-> close();
?>