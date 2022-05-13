<?php

	$servername = "localhost";
	$username = "root";
	$password = "";

	//connect to server and select database
	$connect = mysqli_connect($servername, $username, $password);

	//connection error checking with object method
	if ($connect -> connect_error) 
	{
		die("Connection failed: " . $connect -> connect_error);
	}
	else
	{
		//echo "<i> [DB Connected!] - testing purpose</i> ";
	}

	$sql = 'CREATE DATABASE event_registration';
	mysqli_query($connect, $sql);

	$dbname = "event_registration";

	$connect = mysqli_connect($servername,$username,$password,$dbname);

	//connection error checking with object method
	if ($connect -> connect_error) 
	{
		die("Connection failed: " . $connect -> connect_error);
	}
	else
	{
		//echo "<i> [DB Connected!] - testing purpose</i> ";
	}

	//SQL to create table
	$the_query = "CREATE TABLE IF NOT EXISTS comment_form(
				  id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				  name VARCHAR(30) NOT NULL,
				  email VARCHAR(50) NOT NULL,
				  topic VARCHAR(255) NOT NULL,
				  comment VARCHAR(5000) NOT NULL,
				  datetime INT NOT NULL )";

	mysqli_query($connect, $the_query);

		if(!mysqli_query($connect,$the_query))
		{
			die(mysqli_error($connect));

			echo "ERROR!";
		}

	$the_query = "CREATE TABLE IF NOT EXISTS event_form
				  (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				  companyname VARCHAR(30) NOT NULL,
				  firstname VARCHAR(30) NOT NULL,
				  lastname VARCHAR(30) NOT NULL,
				  phone VARCHAR(15) NOT NULL,
				  eventemail VARCHAR(50) NOT NULL,
				  eventname VARCHAR(30) NOT NULL,
				  eventdate DATE NOT NULL,
				  eventtime TIME NOT NULL,
				  venue VARCHAR(500) NOT NULL,
				  detail VARCHAR(1000) NOT NULL)";

	mysqli_query($connect, $the_query);
	
	if(!mysqli_query($connect,$the_query))
		{
			die(mysqli_error($connect));

			echo "ERROR!";
		}


	$the_query = "CREATE TABLE IF NOT EXISTS feedback_form
				(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(30) NOT NULL,
				lastname VARCHAR(30) NOT NULL,
				email VARCHAR(50) NOT NULL,
				feedback VARCHAR(1000) NOT NULL)";
				
	if(!mysqli_query($connect,$the_query))
		{
			die(mysqli_error($connect));

			echo "Success!!!";
		}


?>