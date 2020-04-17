 <?php
include 'session.php';

$privileges = $session_usertype;
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->
    <title>My Profile | Reachout</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <style type="text/css">
        body{
            color: white;
            background-image: url("imgs/books.jpg");
            /*background-position: center;*/
            background-attachment: fixed;
            background-size: 100%;
            /*background-blend-mode: difference;*/
        }

        .block {
            height: 7em;
            width: 7em;
            margin: 1em;
            text-align: center;
            border-radius: 100%;
        }

        .block:hover {
            filter: alpha(80);
            opacity: 0.8;
        }

        .block:visited {
            filter: alpha(95);
            opacity: 0.95;
        }

        #container {
            height: auto;
            width: auto;
            background: rgba(0,0,0,0.3);
            padding: 15px;
            border: 1px groove white;
            border-radius: 5px;
            box-shadow: 0 0 5px 5px grey;
            padding: 1.5em;
        }

        .data {
            color: orange;
        }

        a {
            text-decoration: none;
            color: lime;
        }

        b {
            font-size: 30;
        }

        .user-info{
            border: 1px solid silver;
            /*-webkit-box-shadow: 0 0 9px 9px silver inset;
            -moz-box-shadow: 0 0 9px 9px silver inset;
            box-shadow: 0 0 9px 9px silver inset;*/
            max-width: 25em;
            padding: 10px;
            text-align: center;
            background-color: rgba(0,0,0,0.7);
        }

        .user-stats {
            margin: 0px 10px;
            box-shadow: 0 1px 1px grey;
            background-color: rgba(0,0,0,0.2);
        }

        img{
            border-radius: 100%;
            border: solid 10px white;
            position: relative;
            top: -10px;
            left: 54px;
            background-color: #252525;
        }

        .changer {
            position: relative;
            left: -150px;
            top: 39px;
            width: 200px;
            height: 100px;
            background-color: transparent;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            outline: none;
            color: transparent;
        }

        #buttons {
            background-color: rgba(0,0,0,0.8);
            text-align: center;
            position: absolute;
            top: 20em;
            left: 25em;
            overflow-x: auto;
            z-index: 1;
        }

        #stat-bubble {
            margin: 10px;
        }

        .menu-btn {
            display: none;
        }

        @media only screen and (max-width: 736px){
            body{
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }

            .jumbotron {
                padding-bottom: 7em;
            }

            .user-info {
                max-width: 98%;
                margin: 2px auto;
                padding: 0em 10px 1em 10px;
            }

            img, .changer {
                text-align: center;
                left: 22%;
            }

            img {
                top: 0px;
            }
            .changer {
                top: -100px;
            }

            #buttons {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                height: 110%;
            }

            .menu-btn {
                display: block;
                margin-right: auto;
                margin-left: auto;
                margin-top: -75px;
                margin-bottom: 20px;
            }

            #menu {
                display: inline-grid;
            }
        }
    </style>
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Reachout</h1>
        <?php if ($privileges === $user_admin) {  // extended privileges
            # code...
            echo "<b>Staff's Profile</b>";
        } else {
            # code...
            echo "<b>Learner's Profile</b>";
        } ?>
    </div>

	<div id="container">
        <img src="imgs/profile/<?php echo $session_pro_pic; ?>" width="200px" height="200px">
        <button class="btn changer" on onclick="document.location.href='addpic.php'">Change Profile Picture</button>

        <button id="menu-btn" class="menu-btn" onclick="viewmenu(this.value);" style="background-color: orange; color: black; padding: 2px;"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</button>

        <div id="buttons" class="alert">
            <span id="menu" class="glyphicon glyphicon-remove" style="font-weight: bolder; position: absolute; right: 0; font-size: 2em; display: none;" onclick="closemenu()"></span>
            <?php if ($session_usertype === $user_admin): ?>

            <button class="btn btn-warning block" onclick="document.location.href='index.php'">Upload <br>Assignments</button>
            <button class="btn btn-success block" onclick="document.location.href='index.php'">Manage<br>Marks</button>
            <button class="btn btn-warning block" onclick="document.location.href='subjects.php'">Manage<br>Subjects</button>
            <button class="btn btn-success block" onclick="document.location.href='attendance.php'">Manage<br>Attendance</button>
            <button class="btn btn-warning block" onclick="document.location.href='users.php'">Manage<br>Users</button>
            <button class="btn btn-success block" onclick="document.location.href='announcement.php'">Anounce<br>ments</button>
            <button class="btn btn-warning block" onclick="document.location.href='logout.php'">logout</button>

            <?php endif ?>

            <?php if ($session_usertype === $user_client): ?>
            <button class="btn btn-warning block" onclick="document.location.href='select_subject.php'">Select<br>Subjects</button>
            <button class="btn btn-success block" onclick="document.location.href='announcement2.php'">Announce<br>ments</button>
            <button class="btn btn-warning block" onclick="document.location.href='index_client.php'">View<br>Results</button>
            <button class="btn btn-success block" onclick="document.location.href='attendance.php'">attendance</button>
            <button class="btn btn-warning block" onclick="document.location.href='logout.php'">logout</button>

            <?php //echo "</br>SU: ".$session_usertype." === UC: ".$user_client; ?>
            <?php endif ?>
        </div>
        <div id="main" class="row">
            <div class="user-info col-md-4">
                <h3 style="text-align: center; background-color: orange; border-radius: 5px; padding: 2px; color: black;">Welcome To Your Reachout Profile</h3>
                <?php
                    echo
                    '<div>' .
                        '<h1>User:<span class="data"> '.$session_username.'</span></h1><hr>' .
                        '<p>First Name:<span class="data"> '.$session_fname.'</span></p><hr>' .
                        '<p>Middle Name:<span class="data"> '.$session_mname.'</span></p><hr>'.
                        '<p>Surname:<span class="data"> '.$session_surname.'</span></p><hr>' .
                        '<p>ID Number:<span class="data"> '.$session_idnum.'</span></p><hr>' .
                        '<p>Phone Number:<span class="data"> '.$session_phone.'</span></p><hr>' .
                        '<p>Email Address:<span class="data"> '.$session_email.'</span></p><hr>' .
                    '</div>';
                ?>
                <a style="border: 1px solid; padding: 3px 20px 3px 20px;" href="update.php" title="Update your details">Edit</a>
            </div>
            <div class="alert user-stats col-lg-8 pull" style="color: black;">
                <div class="row text-center" style="padding: 20px; margin-left: auto; margin-right: auto;">

                    <?php if ($session_usertype === $user_client): ?>
                        <div class="well col-sm-5" id="stat-bubble" title="Total number of days I was absent">
                            <p>No. of Present Days</p>
                            <h1>34 days</h1>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Total number of days I was absent">
                            <p>No. of Absent Days</p>
                            <h1>6 days</h1>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="My average mark for the latest term results">
                            <p>Current Average Mark</p>
                            <h1>70%</h1>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Admission Point Score I acquired for the latest term results">
                            <p>APS of latest term results</p>
                            <h1>42 points</h1>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="The number of distictions I acquired for the latest term results">
                            <p>My Disticions so far</p>
                            <h1>7 Distinctions</h1>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Number of subject, I am enrolled for at this accademy">
                            <p>No. of Subjects</p>
                            <h1>7 Subjects</h1>
                        </div>
                    <?php endif ?>

                    <?php if ($session_usertype === $user_admin): ?>
                        <div class="well col-sm-5" id="stat-bubble" title="The number of learners enrolled">
                            <h1>300 learners</h1>
                            <p>Number of Learners in the Academy</p>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Average attendance percentage thus far">
                            <h1>92%</h1>
                            <p>Average Learners Attendance</p>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="My average mark for the latest term results">
                            <h1>99%</h1>
                            <p>Latest Term Performance/Pass rate</p>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Overall Performance Movement Indicator showing difference from previous">
                            <h1>6% <span class="glyphicon glyphicon-arrow-up" style="color: limegreen"></span></h1>
                            <p>Movement of Performance %</p>
                        </div>
                        <div class="well col-sm-5" id="stat-bubble" title="Average Performance in the Mathematics subject">
                            <h1>89%</h1>
                            <p>Subject with the highest average</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="font-size: x-large; clear: both; position:relative; bottom: 0; padding: 0 10px;">
            <h5>Reachout &copy; Copyright 2019, All rights reserved</h5>
        </div>
    </div>
    <script type="text/javascript">
        var btn = document.getElementById("buttons");

        function viewmenu() {
            btn.style.display = "inline-grid";
        }
        function closemenu() {
            btn.style.display = "none";
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".changer").mouseenter(function(){
                $(".changer").css("background-color","rgba(0,0,0,0.5)");
                $(".changer").css("color","white");
            });

            $(".changer").mouseleave(function(){
                $(".changer").css("background-color","Transparent");
                $(".changer").css("color","Transparent");
            });
        });
    </script>
</body>
</html>
