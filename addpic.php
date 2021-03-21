<?php
	include 'session.php';
	if(!empty($_FILES['uploaded_file']))
	{
	  $path = "imgs/profile/";
	  $path = $path . basename($_FILES['uploaded_file']['name']);
	  if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
	    // if successful insert details into the database.
	    $name = basename($_FILES['uploaded_file']['name']);

	    header("location: pic_update.php?pic_name=$name");
	  }
	  else{
	    echo "<div class='alert btn-danger alert-dismissable fade in' style='width: 100%; z-index: 1; position: fixed; opacity: .95; top: 1em;'>" .
	            "<span class='glyphicon glyphicon-warning'></span>" .
	      "<a href='addpic.php' class='close'  aria-label='close'>&times;</a>" .
	      "<p>No file has been chosen, please try again carefully.</p>" .
	      "</div>";
	  }
	}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags first; any content *after* these tags -->
    <title>Add Profile Pic | RunTech</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<style>
		body {
			background: linear-gradient(#242424, #252525, #242424);
		}

		img {
			border: 5px solid darkorange;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="jumbotron text-center">
        <h1>RunTech</h1>
        <p>Change Profile Picture</p>
    </div>
    <div class="container">
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
    		<button class="btn btn-danger" onclick="document.location.href='pic_update.php?pic_name=<?php echo $session_pro_pic?>'">Remove profile Picture</button>
    		<button class="btn btn-default" onclick="document.location.href='profile.php'">Back to Profile</button>
    	</div>
	    <div class="modal-footer" style="font-size: x-large; clear: both; position:relative; bottom: 0; padding: 0 10px;">
	        <h5>RunTech &reg; 2020, All rights reserved</h5>
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