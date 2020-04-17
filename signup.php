<?php

    if (isset($_GET['username'])) {
        include 'session.php';
        $username = $_GET['username'];
        $header = $username;
    }
    else{
        include 'db_config.php';
        $header = "Registration";
    }
?>
<!-- ====================================================================== -->

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

    <title>Sign Up | RICH_OUT!</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="imgs/favicon.png">

        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
                overflow: hidden;
                background-color: transparent;
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
            .error {color: #FF0000;}
        </style>
</head>
<body>
<table cellpadding="20" style="height: 100%; width: 100%;">
    <tbody>
        <tr>
            <td width="100%" height="100%">
                <div align = "center">
                    <div id="loger" style = "-webkit-transition: ease-in 1s; -moz-transition: ease-in 1s; transition: ease-in 1s; background-color: goldenrod; color:#FFFFFF;width:300px; border: solid 1px #FFF; " align = "left">
                        <div style="background-color:#7d6608; text-align: center; padding:3px; border-top-left-radius: 5px; border-top-right-radius: 5px;"><b><?php echo $header; ?></b></div>

                        <div style="margin:30px">
                            <form name='registration' method = "POST" action="adduser.php" id="registration" >
                                Username: <input type="text" name="username" id="username" title="Username" class="dabox" required>
                                First Name: <input type="text" name="firstname" id="firstname" title="First name" class="dabox" required>
                                Middle Name: <input type="text" name="middlename" id="middlename" title="Middle name" class="dabox">
                                Surname: <input type="text" name="surname" title="Surname" id="surname" class="dabox" required>
                                ID Number: <input type="text" name="idnumber" id="idnumber" title="ID Number" class="dabox" required>
                                Phone Number: <input type="text" name="phonenumber" id="phonenumber" title="Phone Number Format: 000 000 0000" class="dabox"required>
                                Email Address: <input type="text" name="email" id="email" title="Email Address" class="dabox" required>
                                Password: <input id="pass1" type="password" name="password" id="password" title="enter your password" class="dabox" required>
                                Confirm Password: <input id="pass2" type="password" onkeydown="verify();" onkeyup="verify();" name="confirmpassword" id="confirmpassword" title="enter your password" class="dabox" required>
                                <input type="checkbox" id="showpassword" onclick="show();"> Show Password<br>
                                <input id="btn" type="submit" name="submit" value="Sign Up"/>
                                <input id="btn" type="button" onclick="document.location.href='index.php'" value="Home"/><br/><br/>
                                <a style="text-decoration: none; color: #7d6608;" href="login.php">I already have an account</a>
                            </form>
                            <h4 id="matcher" style="display: none; color: red;">Passwords must be exactly the same</h4>
                            <?php
                                if (isset($_GET['err1'])) {
                                    echo "<h4 style='color: red;'>Incorrect credentials, please try again carefully</h4>";
                                }
                                if (isset($_GET['fail'])) {
                                    echo "<h4 style='color: red;'>Missing information, please try again carefully</h4>";
                                }
                                if (isset($_GET['exists'])) {
                                    echo "<h4 style='color: red;'>The username '".$_GET['exists']."' is already in use, please try another one.</h4>";
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

function displayStudent(argument) {
    if (document.getElementById()) {}
}
</script>
</body>
</html>