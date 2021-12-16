
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">

</head>
 <body class = "sign-up-body">
 <div class="topnav">
 <img class = "logo" src = "logo.jpg" >
 </div>
 
  <div class = "sign-up-form">
       <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
	  <form action = "" method = "post">
      <label for="name"><b>Name</b></label><br>
      <input type="text" placeholder="Enter Full Name" name="name" required> <br>
	  
	   <label for="email"><b>Email</b></label><br>
      <input type="text" placeholder="Enter Email" name="email" required> <br>
	  
	   <label for="phone"><b>Phone Number</b></label><br>
      <input type="integer" placeholder="Enter Phone Number" name="phone" required> <br>
	  
	  <label for="password"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="password" required> <br>

      <label for="password-repeat"><b>Repeat Password</b></label><br>
      <input type="password" placeholder="Repeat Password" name="password_repeat" required>
	  
	  
      <label for="dob"><b>Date of Birth</b></label><br>
      <input type="datetime" placeholder="Enter Date of Birth" name="dob" required> <br>

      <label for="country"><b>Country</b></label><br>
      <input type="text" placeholder="Enter Country" name="country" required>
	  
	  <label for="brand"><b>Kart Brand</b></label><br>
      <input type="text" placeholder="Enter Kart Brand" name="brand" required> <br>

      <label for="Sponsor"><b>Sponsor</b></label><br>
      <input type="text" placeholder="Enter Sponsor" name="sponsor" required>
	

 
	  
	  
	  <button class = "button" type ="submit" name = "signup" style = "margin-right: 19px;">Sign up</button>
	  <button class = "button" onclick="location.href='Loginpage.html'" type="button"formnovalidate>Cancel</button>
 
      </form>
 
 
 
 </div>
 
 
 </body>
 
 
 
 </html>
 
 
 <?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
		$password_repeat = $_POST['password_repeat'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $brand = $_POST['brand'];
        $sponsor = $_POST['sponsor'];

		if($password == $password_repeat)
		{	
			$sql = "INSERT INTO player(name, email, phone, password,dob, country, brand,sponsor) Values('$name', '$email', '$phone','$password', '$dob', '$country', '$brand', '$sponsor')";

			mysqli_query($link, $sql);

			header("Location: player_login.php");
			die;
		}
         else
		{?>
			<span style = "color: white; position: relative; left:470px; bottom: 990px " >Confirmation password did not match with your password</span>
			<span style = "color: white; position: relative; left: 200px; bottom: 970px " >Please try again</span>
			
		<?php
		}		
		
	}
?>