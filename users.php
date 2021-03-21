<?php
	include 'session.php';

	if(isset($_GET['done'])) {
	    echo "<div class='btn alert-success' alert-dismissable fade in' style='width: 100%; z-index: 1; position: fixed; top: 1em;'>" .
	    			"<span class='glyphicon glyphicon-warning'></span>" .
	          "<a href='users.php' class='close'  aria-label='close'>&times;</a>" .
	          "<p><b>Great!</b>, user details have been set.</p>" .
	          "</div>";
	}
	if(isset($_GET['fail'])) {
	    echo "<div class='btn alert-danger alert-dismissable fade in' style='width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;'>" .
	    			"<span class='glyphicon glyphicon-warning'></span>" .
	          "<a href='users.php' class='close'  aria-label='close'>&times;</a>" .
	          "<p><b>Oops!</b>, Sorry unable to process this transaction, please your manager or developer.</p>" .
	          "</div>";
	}

	$users = $conn->query("SELECT * FROM user ORDER BY firstname");

	if ($session_usertype === $user_client) {
		header("location: profile.php?authfail");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

	<title>UMD | RunTech&reg;</title>

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
    
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/f58590e004.js" crossorigin="anonymous"></script>

	<style type="text/css">
		body{
            background-image: url("images/cover_bg_2.jpg");
            background-position: center;
            background-attachment: fixed;
            /* background-size: 100%; */
            /* background-blend-mode: difference; */
        }

		.alert-transparent {
			background-color: rgba(0, 0, 0, 0.2);
		}

		.container {
            height: auto;
            width: auto;
            background: rgba(0,0,0,0.3);
            padding: 15px;
            border: 1px groove white;
            border-radius: 5px;
            box-shadow: 0 0 5px 5px grey;
            padding: 24px;
		}

		.user-info{
            border: 1px solid silver;
            /*-webkit-box-shadow: 0 0 9px 9px silver inset;
            -moz-box-shadow: 0 0 9px 9px silver inset;
            box-shadow: 0 0 9px 9px silver inset;*/
        }

        .page-heading b {
            font-size: 30;
            color: white;
        }

		.page-heading h3 {
			margin: 0 0 30px 0;
		}
		
		label, h1, h2, h3, #names {
			text-decoration: none;
			color: white;
			text-align: center;
		}

		.main h3 {
			text-align: center;
			background-color: orange;
			border-radius: 5px;
			padding: 5px;
			color: green;
		}


	</style>
</head>
<body>
<div class="container">

	<span style="font-size: 48px; color: darkorange; position: absolute; z-index: 1; top: 0;">
		<i class="fas fa-arrow-alt-circle-left" onclick="document.location.href='profile.php'"></i>
	</span>
	<div class="page-heading text-center" style="color: green;">
		<h3><b>User Management Dashboard</b></h3>
	</div>
	<div class="main">
		<div class="row alert-transparent">
			<div class="alert col-md-4 user-info">
				<h3>Users Registered on the portal</h3>
				<div class="alert alert-transparent" style="height: 350px; overflow: auto;">
					<?php
						if ($users->rowCount() <= 0) {
							# If nothing comes back just display that no users to display
							echo '<p id="names"><h3>No Users to Manage</h3></p><hr>';
						} else {
							# If there are users display them in the fashion
							while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
								if ($user['type'] === $user_admin) {
									echo '<a id="names" class="border text-primary" href="users.php?id='.$user['id'].'"><h4><b>'.$user['firstname'].' '.$user['surname'].'</b></h4></a><hr>';
								}
								else{
									echo '<a id="names" href="users.php?id='.$user['id'].'"><h4>'.$user['firstname'].' '.$user['surname'].'</h4></a><hr>';
								}
							}
						}
					?>
				</div>
			</div>
			<div class="alert col-md-8">
				<h3>User details</h3>
				<div class="alert alert-transparent">
				<?php if (!isset($_GET['id'])) {
					# do the following
				?>
						<form action="adduser.php" method="POST">
							<label>Username</label><br>
							<input type="text" name="username" title="Username" placeholder=" e.g. john" style="width: 100%; height: 2.5em;" required><br><br>

							<label>Identity Number</label><br>
							<input type="text" name="idnumber" title="ID Number" placeholder=" e.g. '9113350004091'" style="width: 100%; height: 2.5em;" required><br><br>

							<label>First Name</label><br>
							<input type="text" name="firstname" title="Middle Name" placeholder=" e.g. 'John'" style="width: 100%; height: 2.5em;" required><br><br>

							<label>Middle Name</label><br>
							<input type="text" name="middlename" title="Middle Name" placeholder=" e.g. 'Kernel'" style="width: 100%; height: 2.5em;"><br><br>

							<label>Surname</label><br>
							<input type="text" name="surname" title="Surname" placeholder=" e.g. 'Smith'" style="width: 100%; height: 2.5em;" required><br><br>

							<label>Email Address</label><br>
							<input type="email" name="email" title="Email Address" placeholder=" e.g. 'username@domain.com'" style="width: 100%; height: 2.5em;" required><br><br>

							<label>Phone Number</label><br>
							<input type="text" name="phonenumber" title="Phone Number" placeholder=" e.g. '0123456789'" style="width: 100%; height: 2.5em;" required><br><br>

							<label>User Type</label><br>
							<select name="usertype" title="User Type" style="width: 100%; height: 2.5em;" required>
								<option value="">Choose type of user</option>
								<option value="admin">Administrator</option>
								<option value="client">Client</option>
							</select><br><br>

							<label>Secure Password</label><br>
							<input type="password" name="password" id=pass1 title="Secure password" placeholder=" New Password" style="width: 100%; height: 2.5em;" required><br><br>

							<label>Confirm Secure password 	<i id="matcher" style="display: none; color: red;">Doesn't match password above</i></label><br>
							<input type="password" name="confirmpassword" id=pass2 title="Secure password" onkeyup="verify();" placeholder="Confirm Password" style="width: 100%; height: 2.5em;" required><br>
							<input type="checkbox" onclick="show();"> <span id="check">Show Password</span><br>

							<hr>

							<input id="btn1" class="btn btn-success" type="submit" name="submit" value="Add User">
							<button class="btn btn-default" onclick="document.location.href='profile.php'">Back to Profile</button>
						</form>
				<?php }
				else{
					$details = $conn->query("SELECT * From user WHERE id = ".$_GET['id']);
					if ($details->rowCount() <= 0) {
						//
					} else {
						while ($detail = $details->fetch(PDO::FETCH_ASSOC))
						$permision = "";

						if ($detail["type"] === $user_admin) {
							$permision = "Administrator";
						}elseif ($detail["type"] === $user_client) {
							$permision = "Client";
						}

						echo '
						<form action="updateuser.php?userid='.$detail["id"].'&frm=users" method="POST">
							<label>Username</label><br>
							<input type="text" name="username" title="Username" style="width: 100%; height: 2.5em;" required value="'.$detail["username"].'"><br><br>

							<label>Identity Number</label><br>
							<input type="text" name="idnumber" title="ID Number" style="width: 100%; height: 2.5em;" required value="'.$detail["idnumber"].'"><br><br>

							<label>First Name</label><br>
							<input type="text" name="firstname" title="First Name" style="width: 100%; height: 2.5em;" required value="'.$detail["firstname"].'"><br><br>

							<label>Middle Name</label><br>
							<input type="text" name="middlename" title="Middle Name" style="width: 100%; height: 2.5em;" value="'.$detail["middlename"].'"><br><br>

							<label>Surname</label><br>
							<input type="text" name="surname" title="Surname" style="width: 100%; height: 2.5em;" required value="'.$detail["surname"].'"><br><br>

							<label>Email Address</label><br>
							<input type="text" name="email" title="Email Address" style="width: 100%; height: 2.5em;" required value="'.$detail["email"].'"><br><br>

							<label>Phone Number</label><br>
							<input type="text" name="phonenumber" title="Phone Number" style="width: 100%; height: 2.5em;" required value="'.$detail["phone_number"].'"><br><br>

							<label>User Type (Currently: '.$permision.')</label><br>
							<select name="usertype" title="User Type" style="width: 100%; height: 2.5em;" required>
								<option value="">Choose type of user</option>
								<option value="admin">Administrator</option>
								<option value="client">Client</option>
							</select><br><br>

							<label>Secure Password</label><br>
							<input type="password" name="password" id=pass1 title="Secure password" style="width: 100%; height: 2.5em;" required value="'.$detail["password"].'"><br><br>

							<label>Confirm Secure password 		<i id="matcher" style="display: none; color: red;">Does not match password above</i></label><br>
							<input type="password" name="confirmpassword" id=pass2 title="Secure password" onkeyup="verify();" style="width: 100%; height: 2.5em;" required value="'.$detail["password"].'"><br>
							<input type="checkbox" onclick="show();"> <span id="check">Show Password</span><br>

							<hr>

							<input id="btn1" class="btn btn-warning" type="submit" name="submit" value="Update User">
							<input id="btn1" class="btn btn-danger" type="button" onclick="document.location.href=\'#delete\'" name="delete" value="Deregister User">
							<button class="btn btn-primary" onclick="document.location.href=\'users.php\'">Register New User</button>
							<button class="btn btn-default" onclick="document.location.href=\'profile.php\'">Back to Profile</button>

						</form>
							';
						}
					} ?>

				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer alert">
		<h5>RunTech&reg; 2020; Management Dashboard;</h5>
	</div>
</div>
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