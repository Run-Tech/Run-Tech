<?php
    if (isset($_GET['fail'])) {
        echo '            
            <div class="alert alert-danger label-danger alert-dismissible fade in">
            <a href="enquire.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Oops!</strong> something went wrong, please send and email to <a href="mailto:info@run-tech.co.za" class="label label-warning">RunTech&reg;</a> for assistance.
            </div>
        ';
    }
?>
<!DOCTYPE html>
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

	</head>
	<body>
		<div id="fh5co-wrapper">
            <div id="fh5co-page">

                <!-- header -->
                <header id="fh5co-header-section" class="sticky-banner">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                            <h1 id="fh5co-logo"><a href="#fh5co-wrapper"><img src="images\Tech.JPG" alt="Tech" height="42" width="42"></a></h1>
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <button class="btn btn-success" onclick="document.location.href='index.html'">Done</button>
                                <button class="btn btn-warning" style="display: none;">Administrators</button>
                            </nav>
                        </div>
                    </div>
                </header>

                <div class="jumbotron text-center">
                    <h2>Send us your details if you would like us to contact you</h2>
                </div>

                <div id="fh5co-enquire">
                    <!-- fh5co- enquire -->
                    <div class="half-contact">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 animate-box bounceIn">
                                    <form action="addenquiry.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name" required/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="surname" class="form-control" placeholder="Surname" required/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="idnumber" class="form-control" placeholder="Your ID number or Parent's ID number'"
                                                    required />
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" required/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email Address"/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="number" name="grade" min="1" max="12" class="form-control" placeholder="Grade e.g. 7" required/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="location" class="form-control" placeholder="Your Location" required/>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select name="codinglevel" id="level" class="form-control" required>
                                                    <option>-- Coding Level --</option>
                                                    <option value="novice">novice</option>
                                                    <option value="beginner">Advanced Beginner</option>
                                                    <option value="competent">Competent</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select name="sessionday" id="session" class="form-control" required>
                                                    <option>-- Choose Day for session --</option>
                                                    <option value="saturday">Saturday</option>
                                                    <option value="sunday">Sunday</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="submit" value="submit enquiry" name="submit" class="form-control btn-success"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- footer -->
                <footer>
                    <div id="footer">
                        <div class="container">
                            <div class="row row-bottom-padded-md">
                                <div class="col-md-3">
                                    <h3 class="section-title">About RunTech&reg;</h3>
                                    <p>RunTech&reg; is a registered non-profit entity with an objective to bring up youngsters in the way of code. We believe programming is best for improving one's logical thinking and problem solving ability and hence a skill to have from a young age which is how Run-Tech&reg; came to be. We plan and carry out boots-on-the-ground projects to accomplish our. This requires a great deal of careful planning, communication and local involvement for each project.
                                    </p>
                                </div>

                                <div class="col-md-3 col-md-push-1">
                                    <h3 class="section-title">Links</h3>
                                    <ul>
                                        <li><a href="#fh5co-wrapper">Home</a></li>
                                        <li><a href="#fh5co-about">Staff</a></li>
                                        <li><a href="#fh5co-blog-section">Blog</a></li>
                                        <li><a href="#fh5co-contact">FAQ / Contact</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <h3 class="section-title">Information</h3>
                                    <ul>
                                        <li><a href="#">Terms &amp; Condition</a></li>
                                        <li><a href="#">License</a></li>
                                        <li><a href="#">Privacy &amp; Policy</a></li>
                                        <li><a href="#fh5co-contact">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="section-title">Contact</h3>
                                    <p>Email: Info@run-tech.co.za</p>
                                    <p>Contact Thato: 081 340 5254</p>
                                    <p>Contact Dimakatso: 073 033 0758</p>
                                    <p>Contact Koketso: 076 308 1106</p>
                                    <form class="form-inline" method="get" action="admin.php" id="fh5co-header-subscribe">
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="email" placeholder="Enter Secret Code" name="code">
                                                    <button type="submit" class="btn btn-default pull"><i class="icon-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="fh5co-social-icons">
                                        <a href="#" style="color: #00acee;" target="_blank"><i class="icon-twitter2"></i></a>
                                        <a href="https://www.facebook.com/RunTech-105568264423596/" style="color: #3b5998;" target="_blank"><i class="icon-facebook2"></i></a>
                                        <a href="#" style="color: #3f729b;" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" style="color: #ea4c89;" target="_blank"><i class="icon-dribbble2"></i></a>
                                        <a href="#" style="color: #c4302b;" target="_blank"><i class="icon-youtube"></i></a>
                                    </p>
                                    <p>Copyright 2020; <span style="color: darkorange;">RunTech&reg;</span>. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- END fh5co-page -->
        </div>
        <!-- END fh5co-wrapper -->


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
