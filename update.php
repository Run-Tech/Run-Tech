<?php
        include 'session.php';
        $username = $session_username;
        $header = '<span style="color: gold;">'.$username.'</span>';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

    <title>Edit profile details | RunTech&reg;</title>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>

        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
                overflow: hidden;
                background-color: #383838;
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
                color: yellow;
                margin-bottom: 3px;
                text-align: center;
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
                        <div style="background-color:#7d6608; text-align: center; padding:3px; border-top-left-radius: 5px; border-top-right-radius: 5px;"><b>Updating <?php echo $header; ?>'s datails</b></div>

                        <?php
                            $sql = "SELECT id FROM user WHERE username =".$username;

                            $result = mysqli_query($conn,$sql);
                        ?>

                        <div style="margin:30px">
                            <form method = "POST" action="updateuser.php?userid=<?php echo $row['id']; ?>&frm=admin">
                                Username: <input type="text" name="username" title="Username" value="<?php echo $row['username']; ?>" class="dabox" required readonly>
                                First Name: <input type="text" name="firstname" title="First name" value="<?php echo $row['firstname']; ?>" class="dabox" required>
                                Middle Name: <input type="text" name="middlename" title="Middle name" value="<?php echo $row['middlename']; ?>" class="dabox">
                                Surname: <input type="text" name="surname" title="Surname" value="<?php echo $row['surname']; ?>" class="dabox" required>
                                ID Number: <input type="text" name="idnumber" title="ID Number" value="<?php echo $row['idnumber']; ?>" class="dabox" required>
                                Phone Number: <input type="text" name="phonenumber" title="Phone Number" value="<?php echo $row['phone_number']; ?>" class="dabox" required>
                                Email Address: <input type="text" name="email" title="Email Address" value="<?php echo $row['email']; ?>" class="dabox" required>
                                Password: <input id="pass1" type="password" name="password" title="enter your password" class="dabox" required>
                                Confirm Password: <input id="pass2" type="password" onkeydown="verify();" onkeyup="verify();" name="confirmpassword" title="enter your password" class="dabox" required>
                                <input type="checkbox" onclick="show();"> Show Password<br>
                                <input id="btn" type="submit" name="submit" value="Update"/>
                                <input id="btn" type="button" onclick="document.location.href='profile.php'" value="back"/><br/>
                            </form>
                            <h4 id="matcher" style="display: none; color: red;">Passwords must be exactly the same</h4>
                            <?php
                                if (isset($_GET['err1'])) {
                                    echo "<h4 style='color: orange;'>Incorrect credentials, please try again carefully</h4>";
                                }
                                if (isset($_GET['fail'])) {
                                    echo "<h4 style='color: orange;'>Missing information, please try again carefully</h4>";
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

var txt = document.getElementById('pass1');
var txt2 = document.getElementById('pass2');
var matcher = document.getElementById('matcher');

function show() {

    if (txt.type === "password" || txt2.type === "password") {
        txt.type = "text";
        txt2.type = "text";
    } else {
        txt.type = "password";
        txt2.type = "password";
    }
}

function verify() {
    if (txt.value !== txt2.value) {
        matcher.style.display="block";
        document.getElementById('btn1').disabled;
    }else{
        matcher.style.display="none";
    }
}
</script>
</body>
</html>