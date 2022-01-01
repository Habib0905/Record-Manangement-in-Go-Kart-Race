<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_adminlogin($link);
	

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
  
</head>
<body class = "container">
<div class="topnav">
 <img class = "logo" src = "logo.jpg" >
  <button class = "button" onclick="location.href='logout.php'" type="button">Logout</button>
  <h2> Welcome to admin Dashboard </h2>
  
  

</div>
<div style = "z-index: 2">
 <div class = "left_side">
<form action="" method="post">
   <button class = "button2" onclick="location.href='admin_home.php'" type="button">Home</button>
   
   <button class = "button2" name = "search" type="submit">Search Player</button>
   
   <button class = "button2" name = "edit_player" type="submit">Update Player</button>
   <button class = "button2" name = "show_all_player" type="submit">Show All Player</button>
   <button class = "button2" name = "add_player" type="submit">Add Player</button>
   <button class = "button2" name = "delete_player" type="submit">Delete Player</button>
   <button class = "button2" name = "tournament" type="submit">Tournament</button>
 
  </form>
   </div>
  
  
	 <div class = "right_side">
 
   <?php
	if(isset($_POST['search']))
	{
	?>

	   <div class = "search-box">
       <h1>Search player using Id</h1>
      <hr>
	  
	  <form action="" method="post">
   
      <input type="text" placeholder="Enter Player ID" name="search_id" required> <br>
	  <button class = "button" type = "submit" name = "searchid" style = "margin-right: 19px;">Search</input>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	      
      </form>
	  </div>
	  
	  <?php
	
	}

    if(isset($_POST['searchid']))
				{
					
					$sql = "select * from player where id = '$_POST[search_id]'";
					$result = mysqli_query($link,$sql);
					while ($row = mysqli_fetch_assoc($result)) 
					{
				  
						?>
						
							
	  <div class = "search-body">
	  
	  
      <h1>Player Information</h1>
      <hr>
	  <form action = "search_performance.php" method= "post">
	  <table style = "margin: 0 auto; position: relative; bottom: 200px;">
	  <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
       <br>
	  <tr>
	  <th>
	  <label for="name"><b>Name:</b></label>
	  </th>
	  <th>
	   <?php 
       echo $row['name'];
       ?>
	   </th>
	    </tr>
	   <br>
	  <tr>
	  <td>
	   <label for="age"><b>Age:</b></label>
	   </td>
	  <td>
	   <?php 
       echo  $row['dob'];
       ?>
	    </td>
	    </tr>
	   <br>
	   
	   
	    <tr>
	  <td>
       <label for="email"><b>Email:</b></label>
	   </td>
	  <td>
	   <?php 
       echo  $row['email'];
       ?>
	   </td>
	   </tr>
	   <br>
	   
	   <tr>
	   <td>
	   <label for="email"><b>Phone:</b></label>
	   </td>
	   <td>
	   <?php 
       echo  $row['phone'];
       ?>
	   </td>
	   </tr>
	   <br>
	   
	   <tr>
	   <td>
       <label for="country"><b>Country:</b></label>
	   </td>
	   <td>
       <?php 
       echo  $row['country'];
       ?>
	   </td>
	   </tr>
	   <br>
	   
	   <tr>
	   <td>
       <label for="kart-manufacturer"><b>Kart-Brand:</b></label>
	   </td>
	   <td>
	   <?php 
       echo  $row['brand'];
       ?>
	   </td>
	   </tr>
	   <br>
        
	    <tr>
        <td>		
       <label for="sponsor"><b>Sponsor:</b></label>
	   </td>
	   <td>
       <?php 
       echo  $row['sponsor'];
       ?>
	   </td>
	   </tr>
	   <br>

						</table>
						
						</div>
						<div style = "position: relative; right: 475px; bottom: 6px">
						
	  <button class = "button" type = "submit" name = "performance" style = "margin-right: 19px;">Performance data</input>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>	
	  
                         </form>
                  </div>
				   
				 
				  		<?php
					}
				}
			
			?>
			



<!-- --------------------------------------->

<?php

	if(isset($_POST['edit_player']))
	{
	?>
	   
	   <div class = "search-box">
       <h1>Search player using Id</h1>
      <hr>
	  
	  <form action="" method="post">
   
      <input type="text" placeholder="Enter Player ID" name="update_id"  required> <br>
	  <button class = "button" type = "submit" name = "update_id_search" style = "margin-right: 19px;">Search</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	      
      </form>
	  </div>
	  
	  <?php
	}

    if(isset($_POST['update_id_search'])){
	
?>	 
		 <div>
		 <form action = "" method = "post">
		  <input type="hidden" name="update_id_hidden" value="<?php echo $_POST['update_id'];?>"> 
		  <div style = "position: relative; right: 200px ">
   <button class = "button1" name = "update_info" type="submit">Update Personal Info</button>
   <button class = "button1" name = "update_performance" type="submit">Update Performance Info</button>
   </div>
   </form>
  </div>

		
	
	<?php
	}
    if(isset($_POST['update_info']))
				{
					
					$sql = "select * from player where id = '$_POST[update_id_hidden]'";
					$result = mysqli_query($link,$sql);
					while ($row = mysqli_fetch_assoc($result)) 
					{
				
						?>
						
							

  <div class = "player-info-body2">
       <h1>Personal Information</h1>
      <hr>
	
        <form action = "admin_edit.php" method = "post">
		
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
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Back</button>
	  </div>
	  
	  </form>
	  
	  <?php
					}
				}
				
				
				
				
			?>
	  
	    </div>
		<!------------------>

				
		<?php	
    if(isset($_POST['update_performance']))		 
		 {
			 ?>
		<div class = "player-info-body2">
		<h1>Update Practise Performances</h1>
		<hr>

				<?php
					
					$sql = "select * from performance where id = '$_POST[update_id_hidden]'";
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
				       
						?>
	
	   <form action = "admin_edit_performance.php" method = "post">
	   <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
       <br>
		
	   <label for="name"><b>Practise Number:</b></label><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp"?>
	  
       <input  class = "input2" type="text" name="practise_no" value="<?php echo $row['practise_no']?>">
       
	   <br>
	  
	   <label for="dob"><b>Laptime:</b></label><?php echo "&nbsp"?>
	   <input  class = "input2" type="text" name="laptime" value="<?php echo $row['laptime']?>">
	   <br>
	   
       <label for="email"><b>Score:</b></label><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="score" value="<?php echo $row['score']?>">
	   <br>
	   
	   <label for="phone"><b>Average Score:</b></label><?php echo " &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="avg_score" value="<?php echo $row['avg_score']?>">
	   <br>
	   
       <label for="country"><b>Percentage Improvement:</b></label><?php echo "&nbsp &nbsp &nbsp"?>
       <input  class = "input2" type="text" name="percent_imp" value="<?php echo $row['percent_imp']?>">
	   <br>

	  <?php
					}
			?>
	
      <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Back</button>
	  </div>
	  
	  </form>

<?php
		 }
?>
	  
	    </div>
		
		
		<!------------------->
		<?php                  
	if(isset($_POST['add_player']))
	{
	?>
	
	  <div class = "sign-up-form"  >
       <h1>Add Players</h1>
      <p>Please fill in the details.</p>
      <hr>
	  <form action = "add_player.php" method = "post">
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
	

 
	  
	  
	  <button class = "button" type ="submit" name = "add" style = "margin-right: 19px;">Add</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
 
      </form>
 
 
 
 </div>
	 
	  
  <?php
	}
	?>
	
	
	
	 <?php
	if(isset($_POST['delete_player']))
	{
	?>

	   <div class = "search-box">
       <h1>Search player using Id</h1>
      <hr>
	  
	  <form action="delete_player.php" method="post">
   
      <input type="text" placeholder="Enter Player ID" name="delete_id" required> <br>
	  <button class = "button" type = "submit" name = "searchid" style = "margin-right: 19px;">Delete</input>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	      
      </form>
	  </div>
	  
	  <?php
	
	}
	?>	
	
	<?php
				if(isset($_POST['show_all_player']))
				{
					?>
					
					<div class = "show_all_players_body">
						<h1>List of all players</h1>
 <?php 
$query = "select * from player";
if($result =  mysqli_query($link,$query)){
 if(mysqli_num_rows($result) > 0){
 echo "<table>";
 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Name</th>";
 echo "<th>DOB</th>";
 echo "<th>Country</th>";
 echo "<th>Phone</th>";
 echo "<th>Kart-brand</th>";
 echo "<th>Sponsor</th>";
 echo "<th>Email</th>";
 echo "<th>View Performancee</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['dob'] . "</td>";
 echo "<td>" . $row['country'] . "</td>";
 echo "<td>" . $row['phone'] . "</td>";
 echo "<td>" . $row['brand'] . "</td>";
 echo "<td>" . $row['sponsor'] . "</td>";
 echo "<td>" . $row['email'] . "</td>";
 echo "<td>" . $row['phone'] . "</td>";
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
						
						<?php
					
				}
			?>
			
			
			


	
      
	  
				
				

</div>
</body>
</html>