<?php 
include_once('config.php');

//Variables
$error_count = 0;

$error_fname = "";
$error_lname = "";
$error_password = "";
$error_email = "";
$error_phone = "";
$error_streetaddress = "";
$error_zip = "";


if(isset($_POST['signup'])){
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$userpassword = ($_POST['password']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);
	$streetAddress = ($_POST['streetAddress']);
	$zip = ($_POST['zip']);

	if ($error_count == 0){
		$sql = "INSERT INTO `customers`(`fname`, `lname`, `password`, `email`, `phone`, `streetAddress`,`zip`) VALUES ('$fname','$lname','$userpassword','$email','$phone','$streetAddress','$zip')";

		if(mysqli_query($conn,$sql)){

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
			}
			else
			{
	   
			//SQL Querry to Database
			$sql2 = "SELECT id, fname, lname, email, phone, streetAddress, zip
			FROM customers
			where email = '$email'";
	   
			if(!$result = $conn->query($sql2)){
				echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
			}  
			else {
				//Set up session to login user after they register.
				session_start();
	   
				$row = $result->fetch_assoc();
	   
				 $_SESSION['logged_in_id'] = $row["id"];;
				 $_SESSION['logged_in_fname'] = $row["fname"];
				 $_SESSION['logged_in_lname'] = $row["lname"];
				 $_SESSION['logged_in_email'] = $row["email"];
				 $_SESSION['logged_in_streetAddress'] = $row["streetAddress"];
				 $_SESSION['logged_in_zip'] = $row["zip"];
				 $_SESSION['logged_in_phone'] = $row["phone"];

				}
				}
				
			//Once registration is complete, goto the confirmation page.
			echo "Registration Sucessful!";
			header("Location: registration_successful.php");
			exit;


		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}

	}
	
	mysqli_close($conn);
}


?>