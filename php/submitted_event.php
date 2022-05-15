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


	//escape variable for security
	if(isset($_POST['companyname'])){
		//the purpose of mysqli_real_escape_string is escapes special characters in a string for use in an SQL statement
		$companyname 	= mysqli_real_escape_string($connect, $_POST['companyname']);
		$firstname 		= mysqli_real_escape_string($connect, $_POST['firstname']);
		$lastname 		= mysqli_real_escape_string($connect, $_POST['lastname']);
		$phone 			= mysqli_real_escape_string($connect, $_POST['phone']);
		$eventemail 	= mysqli_real_escape_string($connect, $_POST['eventemail']);
		$eventname 		= mysqli_real_escape_string($connect, $_POST['eventname']);
		$date 			= mysqli_real_escape_string($connect, $_POST['date']);
		$time			= mysqli_real_escape_string($connect, $_POST['time']);
		$venue 			= mysqli_real_escape_string($connect, $_POST['venue']);
		$detail 		= mysqli_real_escape_string($connect, $_POST['detail']);

		$sql_insert = "INSERT INTO event_form (companyname, firstname, lastname, phone, eventemail, eventname, eventdate, eventtime, venue, detail)
				   VALUES ('$companyname', '$firstname', '$lastname', '$phone', '$eventemail', '$eventname', '$date', '$time', '$venue', '$detail')";
	
		$result = mysqli_query($connect, $sql_insert);
	}

	?>

<!--HTML start here-->
<!DOCTYPE html>
<html>
<head>
	<title>Submitted - Event</title>
	
	<link rel="stylesheet" type="text/css" href="../css/external.css">
	<link rel="icon" type="image/ico" href="../images/recycle_icon.ico"> <!--icon in the tab-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- dropdown icon> -->
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
			margin-top: 4em;
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

	
	<img src="../images/thankyou_event.png" alt="thankyou_event">
	<h1>Thank you for submitting form!</h1>

	<div class="new">
		<a href="../form_event.html"><strong>Submit another form</strong></a>
	</div>

	<button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

</body>


<!-- Footer -->
<footer id="footer-placeholder"></footer>
<!-- Footer Ends Here -->

<script type="text/javascript"src="js/common.js"></script>

</html>