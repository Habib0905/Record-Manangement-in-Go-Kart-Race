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

  


</div>


 
 
  <?php
  if(isset($_POST['banani'])){
	  ?>
	  <div class = "per_info">
	   <h1>Ranking in Banani Tournament</h1>
	   <hr>
	  <?php
 $sql = "SELECT id, name, country, brand, sponsor,points, time_taken FROM player, participates where tour_id = 1 AND player.id = participates.player_id order by time_taken asc";
 if($result = mysqli_query($link, $sql)){
 if(mysqli_num_rows($result) > 0){
	 $i =0;
 echo "<table>";
 echo "<tr>";
 echo "<th>Position</th>";
 echo "<th>ID</th>";
 echo "<th>Name</th>";
 echo "<th>Country</th>";
 echo "<th>Brand</th>";
 echo "<th>Sponsor</th>";
 echo "<th>Points</th>";
 echo "<th>Time taken</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . ++$i . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['country'] . "</td>";
 echo "<td>" . $row['brand'] . "</td>";
 echo "<td>" . $row['sponsor'] . "</td>";
 echo "<td>" . $row['points'] . "</td>";
 echo "<td>" . $row['time_taken'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";
 

 mysqli_free_result($result);
 } else{
 echo "No records matching your query were found.";
 }
 
}

?>
  <br>

 <button class = "button" onclick="location.href='player_leaderboard.php'" type="button" style = "position: relative; right: 287px"; >Back</button>
 </div>
<?php  
  }
  ?>
  
  
  
   <?php
  if(isset($_POST['gulshan'])){
	  ?>
	  <div class = "per_info">
	   <h1>Ranking in Gulshan Tournament</h1>
	   <hr>
	  <?php
 $sql = "SELECT id, name, country, brand, sponsor,points, time_taken FROM player, participates where tour_id = 2 AND player.id = participates.player_id order by time_taken asc";
 if($result = mysqli_query($link, $sql)){
 if(mysqli_num_rows($result) > 0){
	 $i =0;
 echo "<table>";
 echo "<tr>";
 echo "<th>Position</th>";
 echo "<th>ID</th>";
 echo "<th>Name</th>";
 echo "<th>Country</th>";
 echo "<th>Brand</th>";
 echo "<th>Sponsor</th>";
 echo "<th>Points</th>";
 echo "<th>Time taken</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . ++$i . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['country'] . "</td>";
 echo "<td>" . $row['brand'] . "</td>";
 echo "<td>" . $row['sponsor'] . "</td>";
 echo "<td>" . $row['points'] . "</td>";
 echo "<td>" . $row['time_taken'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";

 mysqli_free_result($result);
 } else{
 echo "No records matching your query were found.";
 }
 
}

?>
  <br>

 <button class = "button" onclick="location.href='player_leaderboard.php'" type="button" style = "position: relative; right: 287px"; >Back</button>
 </div>
<?php 
  
  }
  ?>
  
  
     <?php
  if(isset($_POST['uttara'])){
	  ?>
	  <div class = "per_info">
	   <h1>Ranking in Uttara Tournament</h1>
	   <hr>
	  <?php
 $sql = "SELECT id, name, country, brand, sponsor,points, time_taken FROM player, participates where tour_id = 3 AND player.id = participates.player_id order by time_taken asc";
 if($result = mysqli_query($link, $sql)){
 if(mysqli_num_rows($result) > 0){
	 $i =0;
 echo "<table>";
 echo "<tr>";
 echo "<th>Position</th>";
 echo "<th>ID</th>";
 echo "<th>Name</th>";
 echo "<th>Country</th>";
 echo "<th>Brand</th>";
 echo "<th>Sponsor</th>";
 echo "<th>Points</th>";
 echo "<th>Time taken</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . ++$i . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['country'] . "</td>";
 echo "<td>" . $row['brand'] . "</td>";
 echo "<td>" . $row['sponsor'] . "</td>";
 echo "<td>" . $row['points'] . "</td>";
 echo "<td>" . $row['time_taken'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";

 mysqli_free_result($result);
 } else{
 echo "No records matching your query were found.";
 }
 
}

?>
  <br>

 <button class = "button" onclick="location.href='player_leaderboard.php'" type="button" style = "position: relative; right: 287px"; >Back</button>
 </div>
<?php 
  
  }
  ?>

 
</body>
</html>