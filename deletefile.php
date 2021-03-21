<?php
include 'session.php';

$delete = "";

# if the register button is clicked
if (isset($_GET['id']) && isset($_GET['fn'])){

    $filename = $_GET['fn'];

    # prepare and bind
    $stmt = $conn->prepare("CALL delete_document(?)");
    $stmt->bind_param("s", $delete);

    # Bind the following
    $delete = mysqli_real_escape_string($conn, $_GET['id']);
    
    # execute the command
    $stmt->execute();
    if (file_exists($filename)) {
        unlink("uploads/".$filename);
    }
    //echo "A new document record created successfully... Name: ".$filename;
    header("location: manage-files.php?del");

    $stmt->close();
}
else
{
    //header("location: manage-files.php?fail");
    echo "Problem area: ... Name: <code style='color: red'>".$_GET['fn']."</code>";
}

$conn-> close();
?>