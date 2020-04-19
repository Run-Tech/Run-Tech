<?php
    include 'db_config.php';

    $sql = "SELECT * FROM runtech.enquiry ORDER BY enquiry.idenquiry;";

	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RunTech&reg;</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.png">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <style type="text/css">
        body{
            color: white;
            background-image: url("images/cover_bg_2.jpg");
            background-position: center;
            background-attachment: fixed;
            /* background-size: 100%; */
            /* background-blend-mode: difference; */
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
            margin: 10px;
        }

        p {
            margin: 0px;
        }

        b {
            font-size: 30;
            color: white;
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
            box-shadow: 0 1px 1px black;
            background-color: rgba(0,0,0,0.4);
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

            #main {
                z-index: 100;
            }

            .clients {
                height: 50px;
            }
        }
    </style>
    </head>
    <body>

        <div id="container">
            <div class="page-heading text-center" style="color: green;">
                <h3><b>Enquiries Management Dashboard</b></h3>
            </div>
            <div id="main" class="row">
                <div class="user-info col-md-3">
                    <h3 style="text-align: center; background-color: orange; border-radius: 5px; padding: 5px; color: green;">Clients who want to learn programming</h3>
                    <div class="clients">
                        <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '<p class="clients" onclick="document.location.href=\'manage-enquiries.php?id='.$row['idenquiry'].'\'"><b>'.$row['name'].' '.$row['surname'].'</b></p><hr>';
                            }
                        ?>
                    </div>
                </div>
                <div class="user-stats col-md-8" style="color: black; width:73%;">

                    <div class="row col-md-12 text-center" style="padding: 20px; margin-left: auto; margin-right: auto;">
                        <?php if (isset($_GET['id'])) {
                            # do the following
                            $id = $_GET['id'];
                            $ssql = "SELECT * FROM runtech.enquiry WHERE enquiry.idenquiry=".$id;
                            $resultss = $conn -> query($ssql);
                            
                            if($rows = $resultss->fetch_assoc())
                            {
                                echo '
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['name']. ' '. $id .'</h4>
                                    <p>Names</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['surname'].'</h4>
                                    <p>Surname</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['idnumber'].'</h4>
                                    <p>Identity Number</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['phonenumber'].'</h4>
                                    <p>Phone Number</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['grade'].'</h4>
                                    <p>Grade</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['location'].'</h4>
                                    <p>Location</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['codinglevel'].'</h4>
                                    <p>Coding Level</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['sessionday'].'</h4>
                                    <p>Session Day</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['statustype'].'</h4>
                                    <p>Status</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">'.$rows['email'].'</h4>
                                    <p>Email</p>
                                </div>
                                <div class="well col-md-3" id="stat-bubble" title="The number of learners enrolled">
                                    <h4 style="color: black;">Edit<i class="glyphicon glyphicon-facebook"></i></h4>
                                    <p>Modify Details</p>
                                </div>';
                            }
                        }else {
                            echo '<center><p>Enquiries Management Dashboard</p></center>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="font-size: x-large; clear: both; position:relative; bottom: 0; padding: 0 10px;">
                <h5>RunTech&reg; 2020; Management Dashboard;</h5>
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
                


        <!-- jQuery -->

        <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/sticky.js"></script>
        <!-- Superfish -->
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.js"></script>
        <!-- Flexslider -->
        <script src="js/jquery.flexslider-min.js"></script>
        <!-- Date Picker -->
        <script src="js/bootstrap-datepicker.min.js"></script>
        <!-- CS Select -->
        <script src="js/classie.js"></script>
        <script src="js/selectFx.js"></script>


        <!-- Main JS -->
        <script src="js/main.js"></script>
	</body>
</html>
