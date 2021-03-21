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
	  	header("location: recorddox.php?doc_name=$name&doc_size=$size&doc_mod_date=$lastmodded&doc_owner=$session_userid&doc_access=$permission");
	  }
	  else{
	  	echo "<div class='alert btn-danger alert-dismissable fade in' style='width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;'>" .
  				"<span class='glyphicon glyphicon-warning'></span>" .
  	      "<a href='documentlist.php' class='close'  aria-label='close'>&times;</a>" .
  	      "<p>No file has been chosen, please try again carefully.</p>" .
  	      "</div>";
	  }
	}

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

	<title>VMD | RunTech&reg;</title>

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
		<h3><b>Videos Management Dashboard</b></h3>
	</div>
	<div class="main">
		<div class="well well-md">
    		<form enctype="multipart/form-data" method="POST">
    		  <h5>Upload your file</h5>
    		  <input type="file" name="uploaded_file" id="uploaded_file"></input><br />
    		  <input type="submit" value="Upload"></input>
    		</form>
    	</div>
    	<div class="alert well-lg alert-warning">
    		<center><img id="profile-img" src="imgs/profile/<?php echo $session_pro_pic; ?>" width="500px" height="500px" alt="Profile Picture"></center>
    	</div>
    	<div id="p-img" class="alert alert-success well-md">
    		<button class="btn btn-danger" onclick="document.location.href='pic_update.php?pic_name=user.png&pic_owner=$session_userid'">Remove profile Picture</button>
    		<button class="btn btn-default" onclick="document.location.href='profile.php'">Back to Profile</button>
    	</div>
	</div>
	<div class="modal-footer alert">
		<h5>RunTech&reg; 2020; Management Dashboard;</h5>
	</div>
</div>
<script type="text/javascript">
	function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#profile-img').attr('src', e.target.result);
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $("#uploaded_file").change(function(){
	        readURL(this);
	    });
</script>
</body>
</html>