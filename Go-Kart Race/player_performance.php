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
  
  <p style = "color: white; text-align: center; position: relative; bottom: 90px; font-family:'Racing Sans One'; font-size: 20px"> Player Home </p>
</div>
  <div class = "per_info">
       <h1>Performance Data</h1>
	   
      <hr>
	  
	  <?php 

$sql = "SELECT * FROM performance where id ='$user_data[id]'";
if($result = mysqli_query($link, $sql)){
 if(mysqli_num_rows($result) > 0){
 echo "<table>";
 echo "<tr>";
 echo "<th>Practice Number</th>";
 echo "<th>Lap Time</th>";
 echo "<th>Score</th>";
 echo "<th>Average Score</th>";
 echo "<th>Percentage Improvement</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . $row['practise_no'] . "</td>";
 echo "<td>" . $row['laptime'] . "</td>";
 echo "<td>" . $row['score'] . "</td>";
 echo "<td>" . $row['avg_score'] . "</td>";
 echo "<td>" . $row['percent_imp'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";

 mysqli_free_result($result);
 } else{
 echo "No records matching your query were found.";
 }
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>

	
      <br>

	  <button class = "button" onclick="location.href='player_home.php'" type="button" style = "position: relative; right: 287px"; >Back</button>
	  
 </div>



</body>
</html>
