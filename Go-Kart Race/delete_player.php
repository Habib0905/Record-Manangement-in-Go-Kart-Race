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
  

</div>
 
</body>
</html>




<script type="text/javascript">
	if(confirm("Are you sure want to delete ?"))
	{
		document.write("<?php 
		include("connection.php");
		$query = "delete from player where id = $_POST[delete_id]";
		$query_run = mysqli_query($link,$query);
		?>");
	 	window.location.href = "admin_home.php";
	}
	else
	{
		window.location.href = "admin_home.php";
	}
</script>


