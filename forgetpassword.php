<?php
include("db_config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form are detected

    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = md5(mysqli_real_escape_string($conn,$_POST['password']));

        $sql = "SELECT id FROM user WHERE user.username = '$myusername' AND user.password = '$mypassword'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // if ($count > 0) {
        $result1 = $conn->query($sql);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $mynames = $row["firstname"]." ".$row["middlename"];
                $mysurname = $row["surname"];
            }
        }

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        session_start();
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_time'] = date('Y-m-d H:i:s'); // for later developments of 'last seen' & online status
        header("location: profile.php");
        exit;
    }else {
        echo "User does not exist";
        header("location: mylogin.php?err1");
    }
}
if(isset($_SESSION['login_user'])){
    header("location: profile.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

    <title>Login | RunTech Admin!</title>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">


        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
                overflow: hidden;
                background-color: orange;
            }

            label {
                font-weight:bold;
                width:150px;
                font-size:14px;
            }

            .dabox {
                border: 0;
                border-bottom: 2px solid white;
                width: 100%;
                background-color: transparent;
                color: black;
                margin-bottom: 3px;
            }

            #loger {
                border-radius: 5px;
            }

            #loger:hover{
                box-shadow: 0 0 10px 10px gold;
                size: 3em;
            }

            #btn {
                background: linear-gradient(#252525,#242424,#252525);
                padding: 3px 15px;
                margin-top: 3px;
                color: goldenrod;
                border: 0;
                border-radius: 4px;
            }
            #btn:hover {
                background: #fff;
                color: black;
            }

            .table {
                margin-left: auto;
                margin-right: auto;
                border: 2px groove black;
            }
        </style>
</head>
<body>
<table cellpadding="20" style="height: 100%; width: 100%;">
    <tbody>
        <tr>
            <td width="100%" height="100%">
                <div align = "center">
                    <div id="loger" style = "-webkit-transition: ease-in 1s; -moz-transition: ease-in 1s; transition: ease-in 1s; background-color: goldenrod; color:#FFFFFF;width:300px; border: solid 1px #FFF; " align = "left">
                        <div style="background-color:#7d6608; text-align: center; padding:3px; border-top-left-radius: 5px; border-top-right-radius: 5px;"><b>Login</b></div>

                        <div style="margin:30px">

                            <form method = "POST">
                                Username: <input id="txtbx" type="text" name="username" class="dabox">
                                Password: <input type="password" name="password" class="dabox">
                                <input id="btn" type="submit" name="submit" value="Login"/>
                                <input id="btn" type="button" onclick="document.location.href='enquire.php'" value="Home"/><br/>
                            </form>
                            <?php
                                if (isset($_GET['err1'])) {
                                    echo '<h4 style="color: red;">Oops, incorrect credentials, please try again carefully, <a href="forgetpassword.php">Help me out</a></h4>';
                                }
                                if (isset($_GET['set'])) {
                                    echo '<h4 style="color: white;">New user has been registered... you can now login</h4>';
                                }
                            ?>
                        </div>

                    </div>

                </div>
            </td>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    window.onload = function() {
      document.getElementById("txtbx").focus();
    };
</script>
</body>
</html>