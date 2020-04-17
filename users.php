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
	          "<p><b>Oops!</b>, Sorry this user cannot be registered, please try again carefully.</p>" .
	          "</div>";
	}

	$sql = "SELECT * FROM user ORDER BY firstname;";

	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

	<title>UMD | Reachout</title>

	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		body{
			color: black;
			background-image: url("imgs/logo/bg3.jpg");
		}

		#welled {
			background-color: rgba(255, 255, 255, 0.5);
		}
	</style>
</head>
<body>
<div class="jumbotron text-center" style="color: black;">
	<h1>Reachout</h1>
	<h3>User Management Dashboard</h3>
</div>
<div class="container">

	<div class="main">
		<div class="row">
			<div class="well col-md-4">
				<h3>Users Registered on the portal</h3>
				<div class="alert alert-success" style="height: 350px; overflow: auto;">
					<?php
						while ($row = $result->fetch_assoc()) {
							if ($row['type'] === $user_admin) {
								echo '<a href="users.php?id='.$row['id'].'"><h4><b>'.$row['firstname'].' '.$row['surname'].'</b></h4></a><hr>';
							}
							else{
								echo '<a href="users.php?id='.$row['id'].'"><h4>'.$row['firstname'].' '.$row['surname'].'</h4></a><hr>';
							}
						}
					?>
				</div>
			</div>
			<div class="well col-md-8">
				<h3>User details</h3>
				<div class="alert alert-success">
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
							<input type="checkbox" onclick="show();"> Show Password<br>

							<hr>

							<input id="btn1" class="btn btn-success" type="submit" name="submit" value="Add User">
						</form>
				<?php }
				else{
					$sql = "SELECT * From user WHERE id = ".$_GET['id'];
					$results = $conn -> query($sql);
					if ($row = $results->fetch_assoc()) {

						$permision = "";

						if ($row["type"] === $user_admin) {
							$permision = "Administrator";
						}elseif ($row["type"] === $user_client) {
							$permision = "Client";
						}

						echo '
						<form action="updateuser.php?userid='.$row["id"].'&frm=users" method="POST">
							<label>Username</label><br>
							<input type="text" name="username" title="Username" style="width: 100%; height: 2.5em;" required value="'.$row["username"].'"><br><br>

							<label>Identity Number</label><br>
							<input type="text" name="idnumber" title="ID Number" style="width: 100%; height: 2.5em;" required value="'.$row["idnumber"].'"><br><br>

							<label>First Name</label><br>
							<input type="text" name="firstname" title="First Name" style="width: 100%; height: 2.5em;" required value="'.$row["firstname"].'"><br><br>

							<label>Middle Name</label><br>
							<input type="text" name="middlename" title="Middle Name" style="width: 100%; height: 2.5em;" value="'.$row["middlename"].'"><br><br>

							<label>Surname</label><br>
							<input type="text" name="surname" title="Surname" style="width: 100%; height: 2.5em;" required value="'.$row["surname"].'"><br><br>

							<label>Email Address</label><br>
							<input type="text" name="email" title="Email Address" style="width: 100%; height: 2.5em;" required value="'.$row["email"].'"><br><br>

							<label>Phone Number</label><br>
							<input type="text" name="phonenumber" title="Phone Number" style="width: 100%; height: 2.5em;" required value="'.$row["phone_number"].'"><br><br>

							<label>User Type (Currently: '.$permision.')</label><br>
							<select name="usertype" title="User Type" style="width: 100%; height: 2.5em;" required>
								<option value="">Choose type of user</option>
								<option value="admin">Administrator</option>
								<option value="client">Client</option>
							</select><br><br>

							<label>Secure Password</label><br>
							<input type="password" name="password" id=pass1 title="Secure password" style="width: 100%; height: 2.5em;" required value="'.$row["password"].'"><br><br>

							<label>Confirm Secure password 		<i id="matcher" style="display: none; color: red;">Does not match password above</i></label><br>
							<input type="password" name="confirmpassword" id=pass2 title="Secure password" onkeyup="verify();" style="width: 100%; height: 2.5em;" required value="'.$row["password"].'"><br>
							<input type="checkbox" onclick="show();"> Show Password<br>

							<hr>

							<input id="btn1" class="btn btn-warning" type="submit" name="submit" value="Update User">
							<input id="btn1" class="btn btn-danger" type="button" onclick="document.location.href=\'#delete\'" name="delete" value="Deregister User">
							<input id="btn1" class="btn btn-primary" type="button" onclick="document.location.href=\'users.php\'" value="Register New User">

						</form>
							';
						}
					} ?>

				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer well">
		<h5>Reachout &copy; Copyright 2019, All rights reserved</h5>
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