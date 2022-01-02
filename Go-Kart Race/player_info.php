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
  <title> Player Information </title>
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  </div>
  
 
   
  <div class = "player-info-body">
       <h1>Personal Information</h1>
      <hr>
	
   
	   <label for="name"><b>Name:</b></label>
	   <?php 
       echo "&nbsp &nbsp &nbsp &nbsp &nbsp ", $user_data['name'];
       ?>
	   <br>
	  
	   <label for="age"><b>Age:</b></label>
	   <?php 
       echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp",date_diff(date_create($user_data['dob']), date_create('today'))->y, " years";
       ?>
	   <br>
	   
       <label for="email"><b>Email:</b></label>
	   <?php 
       echo "&nbsp &nbsp &nbsp &nbsp &nbsp ", $user_data['email'];
       ?>
	   <br>
	   
	   <label for="email"><b>Phone:</b></label>
	   <?php 
       echo "&nbsp &nbsp &nbsp &nbsp ", $user_data['phone'];
       ?>
	   <br>
	   
       <label for="country"><b>Country:</b></label>
       <?php 
       echo "&nbsp &nbsp &nbsp ", $user_data['country'];
       ?>
	   <br>
       <label for="kart-manufacturer"><b>Kart-Brand:</b></label>
	   <?php 
       echo "&nbsp", $user_data['brand'];
       ?>
	   <br>

       <label for="sponsor"><b>Sponsor:</b></label>
       <?php 
       echo "&nbsp &nbsp &nbsp", $user_data['sponsor'];
       ?>
	   <br>

    
	  <div style = "position: relative; right: 110px; top: 45px">
	  <form action = "player_edit_info.php" method = post>
	  <button class = "button" type = "submit" name = "edit_info">Edit Info</input>
	  </form>
	  <button class = "button" onclick="location.href='player_home.php'" type="button"formnovalidate>Back</button>
	  </div>
  </div>
  
  



</body>
</html>
