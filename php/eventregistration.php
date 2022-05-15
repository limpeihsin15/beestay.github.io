<!DOCTYPE html>
<html lang="en">
<head>
<title>Event Registration Form</title>
<meta charset="utf-8">
<style type="text/css">
body {
  font-family: Georgia;
  padding: 10px;
  background: #f1f1f1;
  color: black;
}
a.button {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

a.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

a.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

a.button:hover span {
  padding-right: 25px;
}

a.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>

<?php
// This code uses MySQLi in a procedural manner to connect to a database.
$servername = "127.0.0.1"; // Depends on where your database is located. In this example, it points back to the local machine
$username = "root"; // Username of your database. The default for MySQL is "root"
$password = ""; // The corresponding password for the username. The default for MySQL is a blank password.
$dbname = "event_registration"; // The name of the database you want to connect to

// Create connection COMMENTED OUT BECAUSE ALREADY CREATED
$handler = mysqli_connect($servername, $username, $password);

// Check connection
if (! $handler) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Create database
mysqli_query($handler, "CREATE DATABASE event_registration");

// Check if database is created
if (mysqli_query($handler, "CREATE DATABASE event_registration")) {
	echo "Database created successfully";
} else {
	echo "Error creating database: " . mysqli_error($handler);
}
$handler->close();

//Connect to database
$handler = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (! $handler) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";



/*COMMENTED OUT BECAUSE ALREADY DROPPED
//Drop Table
mysqli_query($handler, "DROP TABLE event_registration");

if(! mysqli_query($handler, "DROP TABLE event_registration")) {
	die('Could not delete table:'.mysqli_error($handler));
}
echo "Table deleted successfully\n";
*/



// Create Table
$the_query = "CREATE TABLE event_registration (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			eventname VARCHAR(100) NOT NULL,
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30) NOT NULL,
			email VARCHAR(50) NOT NULL,
			countrycode INT(4) NOT NULL,
			mobile INT(13) NOT NULL,
			addressline1 VARCHAR(30) NOT NULL,
			addressline2 VARCHAR(30) NOT NULL,
			postcode INT(5) NOT NULL,
			state VARCHAR(20) NOT NULL,
			country VARCHAR(20) NOT NULL,
			purpose VARCHAR(500)
			)";

mysqli_query($handler, $the_query);
// Check if table is created
if (mysqli_query($handler, $the_query)) {
	echo "Table created successfully";
} else {
	echo "Error creating table: " . mysqli_error($handler);
}
// Insert row into table
$sql_query = "INSERT INTO event_registration (eventname, firstname, lastname, email, countrycode, mobile, addressline1, addressline2, postcode, state, country , purpose) VALUES ('".$_POST["eventname"]."',' ".$_POST["firstname"]."','".$_POST["lastname"]."', ' ".$_POST["user_mail"]."',' ".$_POST["countrycode"]."',' ".$_POST["user_mobile"]."', ' ".$_POST["user_addressline1"]."', ' ".$_POST["user_addressline2"]."', ' ".$_POST["postcode"]."', ' ".$_POST["state"]."', ' ".$_POST["country"]."',' ".$_POST["purpose"]."')";

//check if row successfully inserted
if ($handler->query($sql_query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_query . "<br>" . $handler->error;
}
?>
<br>
<h1>Thank you for submitting the form!</h1>
<a href="..\index.html" class="button"><span>Back to Home</span></a>
</body>
</html>