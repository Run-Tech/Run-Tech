<?php
	include 'session.php';

	if(!empty($_FILES['uploaded_file']))
	{
	  $path = "uploads/";
	  $path = $path . basename( $_FILES['uploaded_file']['name']);
		if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
			// if successful insert details into the database.
			$name = basename( $_FILES['uploaded_file']['name']);
			$size = basename( $_FILES['uploaded_file']['size']);
			$type = basename( $_FILES['uploaded_file']['type']);
			$lastmodded = date("d-m-y H:i:s",fileatime($acualfile));
				
			if (!isset($_POST['permission'])) {
				$permission = "public";
			}else{
				$permission = "private";
			}
			header("location: recorddox.php?doc_name=$name&doc_size=$size&doc_type=$type&doc_mod_date=$lastmodded&doc_owner=$session_userid&doc_access=$permission");
		}else{
			echo '<div class="alert btn-danger alert-dismissable fade in" style="width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;">
					<span class="glyphicon glyphicon-warning"></span>
			<a href="manage-files.php" class="close"  aria-label="close">&times;</a>
			<p>No file has been chosen, please try again carefully.</p>
			</div>';
		}
	}
	
	if(isset($_GET['del'])) {
		echo '<div class="alert btn-success alert-dismissable fade in" style="width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;">
			<span class="glyphicon glyphicon-warning"></span>
		<a href="manage-files.php" class="close"  aria-label="close">&times;</a>
		<p>file successfully deleted,just close this messaged You may continue with your work.</p>
		</div>';
	}
	
	if(isset($_GET['fail'])) {
		echo "<div class='alert btn-success alert-dismissable fade in' style='width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;'>" .
			"<span class='glyphicon glyphicon-warning'></span>" .
		"<a href='manage-files.php' class='close'  aria-label='close'>&times;</a>" .
		"<p>Oops, sorry this transaction has failed... please contact IT if issue persists.</p>" .
		"</div>";
	}

	// checking if you are admin before deleting the record
	if (isset($_GET['fn']) && $session_usertype === $user_admin) {
		$id = $_GET['id'];
		$fn = $_GET['fn'];
		header("location: deletefile.php?id=".$id."&fn=".$fn);
	} elseif ($session_usertype === $user_client) {
		header("location: profile.php?authfail");
	}
?>

<!-- ====================================================================================================== -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->

	<title>FMD | RunTech&reg;</title>

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

		.text-red {
			color: red;
			cursor: pointer;
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
		<h3><b>File Management Dashboard</b></h3>
	</div>
	<div class="container">
		<div class="well well-lg">
			<form enctype="multipart/form-data" action="manage-files.php" method="POST">
			  <h5>Upload your file</h5>
			  <input type="file" name="uploaded_file" id="uploaded_file" class="btn btn-primary"></input><br />
			  <input type="submit" value="Upload" class="btn btn-success"></input><br>
			  <input type="checkbox" name="permission"> <span style="font-weight: bolder;">Is Private?</span>
			</form>
		</div>

		<div class="well well-lg" style="max-height: 3em;">
			<?php
		    	if (isset($_GET['set'])) {
	    			// than display successful.
	    			echo "<p>File: <span style='color: turquoise; background-color: black; padding: 4px; border-radius: 4px;'>*".$_GET['name']."</span>".
	    		 	" | Size: <span style='color: white; background-color: black; padding: 4px; border-radius: 4px;'>".$_GET['size']."</span>".
	    		 	" uploaded successfully</p>";
		    	}

		    	if (isset($_GET['fail'])) {
		    		// If the operation is not successful
		    	    echo "<h4 style='color: ;'>File upload unsuccessful, please try again carefully</h4>";
		    	}
			?>
		</div>

		<div class="well well-lg" style="background-color: white;">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" >
				<thead>
					<tr>
						<td>File Name</td><td>File Size</td><td>File Type</td><td>Uploaded By</td><td>Date Modified</td><td>Permissions</td><td>Action</td>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM runtech.document INNER JOIN runtech.user ON user.id = document.doc_owner;";
					$results = $conn -> query($sql);

					if ($results->num_rows > 0) {
						while ($row = $results->fetch_assoc()) {
							// display from database and reference the upload folder accordingly
							echo '
								<tr>
									<td>
										<p id="filename">'.$row['doc_name'].'</p>
									</td>
									<td>
										<p id="filesize">'.$row['doc_size'].' bytes</p>
									</td>
									<td>
										<p id="type">'.$row['doc_type'].'</p>
									</td>
									<td>
										<p id="owner">'.$row['firstname'].' '.$row['surname'].'</p>
									</td>
									<td>
										<p id="datemod">'.$row['doc_mod_date'].'</p>
									</td>
									<td>
										<p id="permissions">'.$row['doc_access'].'</p>
									</td>
									<td>
										<span class="fa fa-remove text-red" onClick="document.location.href=\'manage-files.php?id='.$row['doc_id'].'&fn='.$row['doc_name'].'\'"></span> &nbsp;&nbsp;
										<a download target="_blank" href="uploads/'.$row['doc_name'].'"><span class="fa fa-download"></span></a>
									</td>
								</tr>';
						}
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal-footer alert">
		<h5>RunTech &reg; 2020; All Rights Reserved;</h5>
	</div>
</div>
</body>
</html>