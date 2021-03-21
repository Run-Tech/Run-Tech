<?php
	include 'session.php';
	$userix=$session_username;
	
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
	<title>Announce | RunTech&reg;</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

	<style type="text/css">
		body{
			background-color: goldenrod;
		}

		#messages{
			min-height: 400px;
			background: radial-gradient(#d8d8d8, #d9d9d9, #d1d1d1);
		}

		#chatbubble-left {
			border-radius: 5px;
			background-color: goldenrod;
			color: white;
			border: 3px solid white;
			border-bottom-left-radius: 30px;
			border-top-right-radius: 30px;
			max-width: 65%;
			padding: 1em;
			margin: 2em;
			box-shadow: 3px 3px red;
		}

		#chatbubble-right {
			border-radius: 5px;
			background-color: white;
			color: orange;
			border: 3px solid goldenrod;
			border-bottom-left-radius: 30px;
			border-top-right-radius: 30px;
			max-width: 65%;
			padding: 1em;
			float: right;
			margin: 2em;
			box-shadow: 3px 3px red;
		}

		#name{
			margin: 2px;
			font-weight: 900;
			font-size: medium;
		}

		#time{
			color: grey;
			font-style: italic;
		}

		#inputarea{
			background: rgba(0,0,0,.8);
			color: black;
			position: sticky;
			bottom: 0;
			width: 100%;
			height: auto;
			margin: 0 auto;
			text-align: center;
		}

		#btns {
			width: 45%;
			text-align: center;
		}

		a.close {
			margin-right: 1em;
			color: red;
		}

		table {
			width: 100%;
		}

		textarea{
			width: 100%;
			height: auto;
			color: 000;
			max-height: 5em;
		}
	</style>
</head>
<body>
<div class="jumbotron text-center">
	<h1>Make an announcement</h1>
	<pre>Welcome to the Announcer <?php echo $userix; ?></pre>
</div>
<div class="container">
	<div class="row">
		<div id="messages" class="well well-md">
			<?php
			$announcements = $conn->query("SELECT * FROM announcement");
			
			 if ($announcements->rowCount() > 0) {
			 	while ($announcement = $announcements->fetch(PDO::FETCH_ASSOC)) {
			 		$users = $conn->query("SELECT * FROM user WHERE id ='".$announcement['announcer']."';");

			 		if ($user = $users->fetch(PDO::FETCH_ASSOC)) {
			 			if ($announcement["id"] % 2 === 0) {
		 			 		echo '<div class="row">
		 						<div id="chatbubble-right" class="alert alert-info alert-dismissable fade in">
		 							<b id="name">'.$user["firstname"].' '.$user["surname"].'</b>
		 							<p>'.$announcement["announcement"].'</p><span id="time">'.$announcement["date_time"].'</span>
		 							<a href="delete_announcement.php?id='.$announcement["id"].'" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove" title="remove"></span></a>
		 						</div>
		 					</div>';
				 		}
				 		else{
		 			 		echo '<div class="row">
		 						<div id="chatbubble-left" class="alert alert-info alert-dismissable fade in">
		 							<b id="name">'.$user["firstname"].' '.$user["surname"].'</b>
		 							<p>'.$announcement["announcement"].'</p><span id="time">'.$announcement["date_time"].'</span>
		 							<a href="delete_announcement.php?id='.$announcement["id"].'" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove" title="remove"></span></a>
		 						</div>
		 					</div>';
				 		}
			 		}
			 	}
			 }
			?>
		</div>
	</div>
</div>
<span id="go"></span>
<div id="inputarea">
    <form method="POST" id="login-opt" action="announce.php?userix=<?php echo $userix; ?>">
        <table cellpadding="10" cellspacing="2" style="padding: 10px;" align="center">
            <!-- <tr>
                <td><strong id="creds">Name:</strong></td>
                <td><input type="text" name="message_by" placeholder="Please enter your Name" style="width: 50%;"></td>
            </tr> -->
            <tr>
                <!-- <td><strong>Message:</strong></td> -->
                <td><textarea cols="150" placeholder="<?php echo 'Write or even code(html/css) the announcement right here, be creative' ?>" name="text" required="true" title="Please make sure you have typed in your message in this area"></textarea></td>
            </tr>
            <tr>
                <td style="text-align: center;"><input id="btns" type="submit" value="Send" class="btn btn-lg btn-success">
                <input id="btns" type="button" onclick="document.location.href='profile.php'" value="Cancel" class="btn btn-lg btn-danger"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>