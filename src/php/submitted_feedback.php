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
	  <!--Logo start here-->
	    <div>
	    	<a href="../index.html"><img src="../images/a click to recycle_transparent.png" alt="a click to recycle_transparent" id="logo"></a>
	  	</div>
	<!-- Navbar on small screens -->
	    <div class="navmenu" id="topnav">
	        <a href="../index.html">Home</a>

	        <!--Trying to do dropdown menu for content-->
	        <div class="dropdown">

	          	<button class="dropbutton">Content
	          	<i class="fa fa-caret-down"></i></button>

	          	<div class="dropdown-content" id="topdrop">
		            <a href="../material.html">Materials Type</a>
		            <a href="../recyclingtips.html">Recycling Tips</a>
		            <a href="../companies.html">Company List</a>
		            <a href="../furtherinfo.html">Further Information</a>
	          	</div>

	        </div>

	        <div class="dropdown">

	          	<button class="dropbutton">Event
	          	<i class="fa fa-caret-down"></i></button>

	          	<div class="dropdown-content" id="topdrop2">
	            	<a href="../eventlist.html">Event List</a>
	            	<a href="../registerform.html">Register Here</a>
	          	</div>

	        </div>

	        <a href="../contact.html">Contact</a>
	        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
	      
	    </div>
	    <!--Navbar end here-->
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
<footer>
<h3><a href="contact.html">Contact Us</a> to ask a question, provide feedback, or suggest event.</h3>
      <div id="share-buttons">
        <!-- Email -->
        <a href="mailto:aclicktorecycle@gmail.com&amp;Subject=Enquiries&amp;Body=?>">
        <img src="images/email.png" alt="Email" />
        </a>
 
        <!-- Facebook -->
        <a href="http://www.facebook.com/aclicktorecycle" target="_blank">
        <img src="images/facebook.png" alt="Facebook" />
        </a>
    
        <!-- LinkedIn -->
        <a href="http://www.linkedin.com/aclicktorecycle" target="_blank">
        <img src="images/linkedin.png" alt="LinkedIn" />
        </a>

        <!-- Twitter -->
        <a href="https://twitter.com/aclicktorecycle&amp;text=Paper%20and%20Plastic%20Conference&amp;hashtags=aclicktorecycle" target="_blank">
        <img src="images/twitter.png" alt="Twitter" />
        </a>
        
      </div>
      <br>
<small><i>Copyright &copy; 2019 Sunway University</i></small>

</footer>
<!--footer end here-->
	
<script type="text/javascript">

	// sticky top navigation 
	window.onscroll 	= function() {myFunction()}; 
	var topnav 			= document.getElementById("topnav");
	var navdropdown 	= document.getElementById("topdrop");
	var navdropdown2 	= document.getElementById("topdrop2");

	var sticky = topnav.offsetTop;

	function myFunction() 
	{
	 	if (window.pageYOffset >= sticky) 
	  	{
	   		topnav.classList.add("sticky");
	    	navdropdown.classList.add("dropdownsticky");
	    	navdropdown2.classList.add("dropdownsticky");
	  	} 
	  	else 
	  	{
		    topnav.classList.remove("sticky");
		    navdropdown.classList.remove("dropdownsticky");
		    navdropdown2.classList.remove("dropdownsticky");
	  	}
	}

	// When the user scrolls down 750px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() 
	{
	  if (document.body.scrollTop > 750 || document.documentElement.scrollTop > 750) 
	  {
	    document.getElementById("topBtn").style.display = "block";
	  } 
	  else 
	  {
	    document.getElementById("topBtn").style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() 
	{
	  document.body.scrollTop = 0; // For Safari
	  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}
	</script>

</body>
</html>