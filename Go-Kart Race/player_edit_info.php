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
  

<?php
	
    if(isset($_POST['edit_info']))
				{
					
					$sql = "select * from player where id = '$user_data[id]'";
					$result = mysqli_query($link,$sql);
					while ($row = mysqli_fetch_assoc($result)) 
					{
				
						?>
						
							

  <div class = "player-info-body2">
       <h1>Personal Information</h1>
      <hr>
	
        <form action = "player_edit.php" method = "post">
		
		<input type="hidden" name="id" value="<?php echo $row['id']?>"> 
       <br>
		
	   <label for="name"><b>Name:</b></label><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp"?>
	  
       <input  class = "input2" type="text" name="name" value="<?php echo $row['name']?>">
       
	   <br>
	  
	   <label for="dob"><b>Birth Date:</b></label><?php echo "&nbsp"?>
	   <input  class = "input2" type="text" name="dob" value="<?php echo $row['dob']?>">
	   <br>
	   
       <label for="email"><b>Email:</b></label><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="email" value="<?php echo $row['email']?>">
	   <br>
	   
	   <label for="phone"><b>Phone:</b></label><?php echo " &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="phone" value="<?php echo $row['phone']?>">
	   <br>
	   
       <label for="country"><b>Country:</b></label><?php echo "&nbsp &nbsp &nbsp"?>
       <input  class = "input2" type="text" name="country" value="<?php echo $row['country']?>">
	   <br>
       <label for="brand"><b>Kart-Brand:</b></label>
	   <input  class = "input2" type="text" name="brand" value="<?php echo $row['brand']?>">
	   <br>

       <label for="sponsor"><b>Sponsor:</b></label><?php echo " &nbsp &nbsp "?>
       <input  class = "input2" type="text" name="sponsor" value="<?php echo $row['sponsor']?>">
	   <br>

     
	  <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='player_info.php'" type="button"formnovalidate>Back</button>
	  </div>
	  
	  </form>
	  
	  <?php
					}
				}
				
				
				
				
			?>
	  
	    </div>