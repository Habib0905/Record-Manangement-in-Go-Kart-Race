<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($link);
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
  
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  
  <p style = "color: white; text-align: center; position: relative; bottom: 90px; font-family:'Racing Sans One'; font-size: 20px"> Player Home
   
  <div class = "login-form">
       <h1>Performance Data</h1>
      <hr>
	  <form action="" method="post">
   
	  <label for="email"><b>Practice Number:</b></label><br>

	   <label for="name"><b>Lap Time:</b></label><br>
	  
	   <label for="age"><b>Score:</b></label><br>
     
      <label for="country"><b>Average Score:</b></label><br>
      
      <label for="kart-manufacturer"><b>Percentage Improvement:</b></label><br>



      

 
	  
	  
	 
	  <button class = "button" onclick="location.href='Loginpage.html'" type="button"formnovalidate>Back</button>
  </div>

</div>

</body>
</html>
