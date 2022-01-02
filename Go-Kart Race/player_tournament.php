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



<style>
h2{
	font-family: 'Racing Sans One';
	color: #DBD8D3;
	text-align: center;
	position: relative;
	bottom: 80px;
	
}
</style>
  <title> Player Dashboard </title>
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  <h2> Welcome to your Go-Kart Dashboard </h2>
  
  <p style = "color: white; text-align: center; position: relative; bottom: 90px; font-family:'Racing Sans One'; font-size: 20px"> Welcome  <?php
  
  echo $user_data['name'];
  ?> </p> 

</div>
 <div>
   <button class = "button3" onclick="location.href='player_leaderboard.php'" type="button">Leaderboard</button>
   <button class = "button3" onclick="location.href='player_participate.php'" type="button">Participate in Tournament</button>
   <button class = "button3" onclick="location.href='player_home.php'" type="button">Back</button>
  
  </div>


</body>
</html>