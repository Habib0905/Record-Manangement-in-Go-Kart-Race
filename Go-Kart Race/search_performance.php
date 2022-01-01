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
  
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  <h2> Welcome to admin Dashboard </h2>
  
  

</div>



<div class = "per_info">
       <h1>Performance Data</h1>
	   
      <hr>
	  
	
<?php

include("connection.php");
$sql = "SELECT * FROM performance where id = '$_POST[id]'";
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
 
}

?>

<form action="" method="post">
   
	  <button class = "button" type = "submit" name = "searchid" style = "margin-right: 230px;">Search</input>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	      
      </form>
</div>	
 </body>
 </html>