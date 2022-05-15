<?php

	$servername = "localhost"; 	//Host name
	$username = "root"; 		//Mysql username
	$password = "";				//Mysql password
	$dbname = "event_registration";		//database name

	//procedural method
	$connect = mysqli_connect($servername, $username, $password, $dbname);

	//connection error checking with object method
	if ($connect -> connect_error) 
	{
		die("Connection failed: " . $connect -> connect_error);
	}
	else
	{
		//echo "<i> [DB Connected!] - testing purpose</i> ";
	}

	if(isset($_POST['feedback'])){
		//the purpose of mysqli_real_escape_string is determine if a variable is declared and is different than NULL
		//firstname
		$feedback_fn 		= mysqli_real_escape_string($connect, $_POST['feedback_fn']);
		//lastname
		$feedback_ln		= mysqli_real_escape_string($connect, $_POST['feedback_ln']);
		//email
		$feedback_email 	= mysqli_real_escape_string($connect, $_POST['feedback_email']);
		//feedback given by user
		$feedback 			= mysqli_real_escape_string($connect, $_POST['feedback']);

		$sql_insert = "INSERT INTO feedback_form (firstname, lastname, email, feedback)
				   VALUES ('$feedback_fn', '$feedback_ln', '$feedback_email', '$feedback')";
	
		$result = mysqli_query($connect, $sql_insert);

	}

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Submitted - Feedback</title>
	<link rel="stylesheet" type="text/css" href="../css/external.css">
	<link rel="icon" type="image/ico" href="../images/recycle_icon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- dropdown icon> -->
	<script type="text/javascript" src="js\external.js"></script>
	<style type="text/css">
		
		.new, a{
		  color: brown;
		  text-decoration: none;
		  padding: 10px;
		  text-align: center;
		}
        
        .new{
        	margin: 1em;
        	font-size: 25px;
        }

		/* mouse over link */
		a:hover {
		  color: #000080;
		  text-decoration: underline;
		}

		/* selected link */
		a:active {
		  color: red;
		  text-decoration: underline;
		}

		h1{
			text-align: center;
			color: #9acd32;
			font-family: inherit;
			width: 50%;
			margin-right: 25%;
			margin-left: 25%;
		}

		img{
			width: 50%;
			margin-left: 25%;
			margin-right: 25%
		}

	</style>
</head>


<body>
	<header>
	<div id="common-placeholder"></div>
	</header>


	<br>
	<img src="../images/thankyou_feedback.png" alt="thankyou_feedback">
	<h1>Thank you for giving feedback!</h1>

	<div class="new">
		<a href="../contact.html"><strong>Submit another feedback</strong></a>
	</div>

	<!--Go back to top-->
	<button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

</body>


<!-- Footer -->
<footer id="footer-placeholder"></footer>
<!-- Footer Ends Here -->

<script type="text/javascript"src="js/common.js"></script>

</body>
</html>