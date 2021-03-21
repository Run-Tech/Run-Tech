<?php
include 'session.php';

# if GET method has data and session_userid is set
if (isset($_GET['pic_name']) && isset($session_userid)){
    try {
    
        # set variable with call statement and prepare the connection
        $pic_update_qry = "CALL update_pic(?, ?)";
        $stmt = $conn->prepare($pic_update_qry);
    
        # defining the parameters
        $pic_name = $_GET['pic_name'];
        $pic_owner = $session_userid;

        # Binding of parameters to the procedure statment call.
        $stmt->bindParam(1, $pic_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $pic_owner, PDO::PARAM_STR);

        # execute the procedure call statement
        $stmt->execute();

        echo "A new document record created successfully";
        //header("location: profile.php?set&name=$pic_name&owner=$pic_owner");
        //redirect("profile.php?set&name=$pic_name&owner=$pic_owner");

    } catch (\Throwable $th) {
        throw $th;
        //echo "\n\tProblem area: ".$session_userid."\n\t".$_GET['pic_name'];
    }

}
else
{
    //header("location: admin.php?fail");
    echo "Problem area: ".$session_userid." ".$_GET['pic_name'];
}
?>