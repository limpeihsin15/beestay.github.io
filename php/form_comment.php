<?php
	
	//set teh timezone to store the current time for comment
	date_default_timezone_set("Asia/Singapore");

	$servername = "localhost"; 			//Host name
	$username 	= "root"; 				//Mysql username
	$password 	= "";					//Mysql password
	$dbname 	= "event_registration";			//database name

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
	if(isset($_POST['comment']))
	{
		//the purpose of mysqli_real_escape_string is escapes special characters in a string for use in an SQL statement
		$name 		= mysqli_real_escape_string($connect, $_POST['name']);
		$email		= mysqli_real_escape_string($connect, $_POST['email']);
		$topic 		= mysqli_real_escape_string($connect, $_POST['topic']);
		$comment 	= mysqli_real_escape_string($connect, $_POST['comment']);
		$datetime	= time();

		$sql_insert = "INSERT INTO comment_form (name, email, topic, comment, datetime)
				   		VALUES ('$name', '$email', '$topic', '$comment', '$datetime')";
	
		$result = mysqli_query($connect, $sql_insert);

		//checking connection for insert data
		if(!$result)
			{
				die(mysqli_error($connect));

				echo "ERROR!";
			}
	}


?>

<!DOCTYPE>
<html lang = en>

<head>
	<title>Comment Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<link rel="stylesheet" type="text/css" href="../css/external.css">
	<link rel="icon" type="image/ico" href="../images/recycle_icon.ico"><!--icon tab-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- dropdown icon> -->
	<script type="text/javascript" src="js\external.js"></script>


	<style type="text/css">
		
		.example
		{
			background-image: url("../images/question.jpg");
			background-size: 125%;
			background-color: #cccccc;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			margin: 0;
			padding: 0;
			min-height: 565px;
			position:relative;
			opacity:0.85;
			width: 100%;
		}

		ul, p ,h3{
			margin-left: 30%;
			margin-right: 30%;
		}

		p{
			margin: 1px 30%;
		}

		.example a{
			color: #000080;
			text-decoration: underline;
		}

		.example a:hover{
			color: #800000;
			text-decoration;
			font-weight:bold;
		}

		footer img{
			opacity: 1;
		}
	</style>
</head>


<body>
	<header>
	  <!--Logo start here-->
	    <div>
	    	<a href="../index.html"><img src="../images/a click to recycle_transparent.png" alt="a click to recycle_transparent" id="logo" style="opacity: 1"></a>
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


		<div class="example">
			<h1>What can I ask?</h1>
			<h3>Here are some example of questions.</h3>

			<ul>
				<li>Does recycling do more harm than good?</li>
				<li>What happens when you put everything into one recycling bin?<br></li>
				<li>Why recycle is important?<br></li>
				<li>Where is the recycle company in Malaysia? <br><a href="../companies.html">Here are the companies list!</a></li>
				<li>Are plastic bags recyclable? <br> <a href="../material.html">YES! Read more.</a></li>
				<li>Can aluminum foil be recycled? <br> <a href="../material.html">YES! Read more</a></li>
				<li>Is glass recyclable? <br> <a href="../material.html">YES! Read more</a></li>
			</ul>
		</div>

		<div class="display_comment">

			<?php

			//select data from
			$sql = "SELECT name, email, topic, comment, datetime  
					FROM comment_form";
			$result = mysqli_query($connect, $sql);

			//checking connection for select data
			if(!$result)
			{
				die(mysqli_error($connect));

				echo "ERROR!";
			}

			//display the comment
			$count = mysqli_num_rows($result);

			if ($count = 0) 
			{
				echo "<p>No comment.</p>";
			}

			else
			{ 
					echo "<h3>Here are the comments</h3>";
				while ($row = mysqli_fetch_array($result)) 
				{
					//set the format and assign datetime into variable date
					$date = (date("d M Y h:i:s a", $row['datetime']));

					echo "<p>".$row['name']. ", " .$row['email']. " &nbsp; " .$date. "</p>";
					echo "<p>Topic: ".$row['topic']. "</p>";
					echo "<p>Comment:<br>" .$row['comment']. "</p><br>";
					echo "<hr>";
				}
			}
			?>

		</div>

		<h1>If you have any question, please comment below!</h1>
		

		<!--Click o the button will open the form-->
		<button class="open-button" onclick="openForm()">Click me and comment!</button>
		
		<!--Question Form Start Here-->
		<div>
			<div class="form-popup" id="myForm">
				<form method="post" class="form-container" onsubmit="alertMessage()" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<h2>Please fill out all fields</h2>
					<p style="color: red">* Required Fields</p>
					<div>
						<label for="name">Name *</label>
						<input type="text" id="name" name="name" placeholder="Eg.Nick Wong" required>
					</div>

					<div>
						<label for="email">Email *</label>
						<input type="email" id="email" name="email" placeholder="Eg.nickywong90@example.com" required>
					</div>

					<div>
						<label for="topic">Topic *</label>
						<input type="text" id="topic" name="topic" placeholder="Eg. Eletronics" required>
					</div>

					<div>
						<label for="coment">Comment *</label>
						<textarea id="comment" name="comment" placeholder="Eg. Are eletronics recyclable? How to recycle it?" required></textarea>
					</div>

					<div class="button">
						<button type="submit" class="btn">Comment</button>
						<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
					</div>
				</form>
			</div>
		</div>
		<!--Question Form End Here-->

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

<!--Javascript start here-->
<script type="text/javascript">

	// sticky top navigation 
	window.onscroll = function() {myFunction()}; 
	var topnav = document.getElementById("topnav");
	var navdropdown = document.getElementById("topdrop");
	var navdropdown2 = document.getElementById("topdrop2");

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

	//when click on the button, the form will popup
	function openForm() 
	{
		document.getElementById("myForm").style.display = "block";
	}

	//click on close button, the form will close
	function closeForm() 
	{
		document.getElementById("myForm").style.display = "none";
	}

	//alert message after submitting the form
	function alertMessage() 
	{
	 	alert("Your comment submitted sucessfully. \nWe'll email you as fast as possible!");
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

</html>