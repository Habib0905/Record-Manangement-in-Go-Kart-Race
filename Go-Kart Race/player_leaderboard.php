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
h1{
	font-family: 'Racing Sans One';
	color: #DBD8D3;
	text-align: center;
	position: relative;
	bottom: 95px;
	font-size: 50px;
	
}
</style>
  <title> Player Dashboard </title>
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  <h1> Choose Tournament</h1>
  

</div>
 <div>
 <form action ="show_leaderboard.php" method = "post">
   <button class = "button3" name = "banani" type="submit">Banani Tournament</button>
   <button class = "button3" name = "gulshan" type="submit">Gulshan Tournament</button>
   <button class = "button3" name = "uttara" type="submit">Uttara Tournament</button>
   <button class = "button3" onclick="location.href='player_tournament.php'" type="button">Back</button>
   </form>
  </div>
  
  
</body>
</html>