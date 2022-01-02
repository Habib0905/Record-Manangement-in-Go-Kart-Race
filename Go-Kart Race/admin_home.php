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

	   <div class = "search-box" style = "position: relative; right: 70px;">
       <h1 style = "font-size: 30px;">Search player using Id</h1>
	
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
	  <form action = "" method= "post">
	  <table style = "margin: 0 auto; position: relative; bottom: 235px;">
	  <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
       <br>
	   
	   <tr>
	  <th>
	  <label for="id"><b>ID:</b></label>
	  </th>
	  <th>
	   <?php 
       echo $row['id'];
       ?>
	   </th>
	    </tr>
	  <tr>
	  <td>
	  <label for="name"><b>Name:</b></label>
	  </td>
	  <td>
	   <?php 
       echo $row['name'];
       ?>
	   </td>
	    </tr>
	   <br>
	  <tr>
	  <td>
	   <label for="dob"><b>DOB:</b></label>
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
						<div style = "position: relative; right: 475px; bottom: 20px">
						
	  <button class = "button" type = "submit" name = "performance" style = "margin-right: 19px;">Performance data</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>	
	  
                         </form>
                  </div>
				   
				 
				  		<?php
					}
				}
			
			?>
			
			
			<?php
			if(isset($_POST['performance'])){
			
			
			?>
			<div class = "per_info">
       <h1>Performance Data</h1>
	   
      <hr>
	  
	
<?php


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


   
	  <div style = "position: relative; right: 280px;">
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Back</button>
	  </div>
	      
      
</div>	

<?php
			}
?>

<!-- --------------------------------------->

<?php

	if(isset($_POST['edit_player']))
	{
	?>
	   
	   <div class = "search-box" style = "position: relative; right: 70px;">
       <h1 style = "font-size: 30px">Update player using Id</h1>
	
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
		  <div style = "position: relative; right: 200px; bottom: 125px ">
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
	  
       <input  class = "input2" type="text" name="name" required value="<?php echo $row['name']?>">
       
	   <br>
	  
	   <label for="dob"><b>Birth Date:</b></label><?php echo "&nbsp"?>
	   <input  class = "input2" type="text" name="dob" required  value="<?php echo $row['dob']?>">
	   <br>
	   
       <label for="email"><b>Email:</b></label><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="email" required value="<?php echo $row['email']?>">
	   <br>
	   
	   <label for="phone"><b>Phone:</b></label><?php echo " &nbsp &nbsp &nbsp &nbsp"?>
	   <input  class = "input2" type="text" name="phone" required  value="<?php echo $row['phone']?>">
	   <br>
	   
       <label for="country"><b>Country:</b></label><?php echo "&nbsp &nbsp &nbsp"?>
       <input  class = "input2" type="text" name="country" required value="<?php echo $row['country']?>">
	   <br>
       <label for="brand"><b>Kart-Brand:</b></label>
	   <input  class = "input2" type="text" name="brand" required  value="<?php echo $row['brand']?>">
	   <br>

       <label for="sponsor"><b>Sponsor:</b></label><?php echo " &nbsp &nbsp "?>
       <input  class = "input2" type="text" name="sponsor" required value="<?php echo $row['sponsor']?>">
	   <br>

     
	  <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	  </div>
	  
	  </form>
	  
	  <?php
					}
				}
				
				
				
				
			?>
	  
	    </div>
		<!------------------>
		<?php
		 if(isset($_POST['update_performance'])){
	
?>	 
		 <div>
		 <form action = "" method = "post">
		  <input type="hidden" name="update_id_hidden" value="<?php echo $_POST['update_id_hidden'];?>"> 
		   <div>
   <button class = "button3" name = "update_existing" type="submit">Update Existing Performance</button>
   <button class = "button3" name = "insert_performance" type="submit">Insert Performance</button>
   </div>
   </form>
  </div>
		
<?php
		 }

?>
				
			<?php	
    if(isset($_POST['update_existing']))		 
		 {
			 ?>
		<div class = "player-info-body2">
		<h1>Update Practise Performances</h1>
		<hr>
        <div style = "position: relative; right: 14px;">
		<?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Practice Number</th>";
        echo "<th>LapTime</th>";
        echo "<th>Score</th>";
        echo "<th>Average Score</th>";
        echo "<th>Percentage Improvement</th>";
        echo "</tr>";
		?>
		
		
		
				<?php
					
					$sql = "select * from performance where id = '$_POST[update_id_hidden]'";
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
				       
						?>
	
	   <form action = "admin_edit_performance.php" method = "post">
	   
	   <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
	  
       <input type="hidden" name="practise_no" value="<?php echo $row['practise_no']?>">
       
	  <?php
	  
	  echo "<tr>";
	  echo "<td>" . $row['practise_no'] . "</td>";
	  echo '<td><input class="input2" type="text" name="laptime" value="'. $row['laptime'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="score" value="'. $row['score'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="avg_score" value="'. $row['avg_score'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="percent_imp" value="'. $row['percent_imp'] .'"></td>';
	  echo "</tr>";
					}	
      echo "<table>";
      	  
	  ?>
	  
	  <div style = "position: relative; right: 30px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	 
	  </div>
	  
		</div>
		</form>
		
		 <?php
					
		 }
	   ?>
		</div>
		
		
					<?php	
    if(isset($_POST['insert_performance']))		 
		 {
			 ?>
			 
		<div class = "player-info-body2">
		<h1 style = "font-size: 25px;">Insert Practise Performances</h1>
		<hr>
        <div style = "position: relative; right: 14px;">
		<?php
        echo "<table>";
        echo "<tr>";
		echo "<th>Practise Number</th>";
        echo "<th>LapTime</th>";
        echo "<th>Score</th>";
        echo "<th>Average Score</th>";
        echo "<th>Percentage Improvement</th>";
        echo "</tr>";
		?>
		
		
		
	
	   <form action = "admin_insert_performance.php" method = "post">
	   
	   <input type="hidden" name="insert_id" value="<?php echo $_POST['update_id_hidden'];?>"> 
	  
       
       
	  <?php
	  $sql = "select max(practise_no) from performance where id = '$_POST[update_id_hidden]'";
					$result = mysqli_query($link,$sql);
					
					$result = $result->fetch_array();
                    $quantity = intval($result[0]) +1;

			?>			
	  <input type="hidden" name="practise_no_hidden" value="<?php echo $quantity?>">
	  
	  <?php
	  echo "<tr>";
	  echo "<td>" .$quantity. "</td>";
	  echo '<td><input class="input2" type="text" name="laptime"></td>';
	  echo '<td><input class="input2" type="text" name="score" ></td>';
	  echo '<td><input class="input2" type="text" name="avg_score"></td>';
	  echo '<td><input class="input2" type="text" name="percent_imp" ></td>';
	  echo "</tr>";
						
      echo "<table>";
      	  
	  ?>
	  
	  <div style = "position: relative; right: 100px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Insert</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	 
	  </div>
	  
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

	   <div class = "search-box" style = "position: relative; top: 150px; left: 22px">
       <h1 style = "color: white">Delete player using Id</h1>
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
						<h1><u>List of all players</u></h1>
						
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
<button class = "button" onclick="location.href='admin_home.php'" type="button" style = "position: relative; right: 450px"; >Back</button>
						
						<?php
					
				}
			?>
				

</div>



   <?php
	if(isset($_POST['tournament']))
	{
	?>
	
	 <div>
		 <form action = "" method = "post">
		  
		  <div>
		  <form action = "" method = "post">
          <button class = "button3" name = "banani" type="submit">Banani Tournament</button>
          <button class = "button3" name = "gulshan" type="submit">Gulshan Tournament</button>
		  <button class = "button3" name = "uttara" type="submit">Uttara Tournament</button>
		  
   </div>
   </form>
  </div>
	
<?php
	}
?>

 <?php
	if(isset($_POST['banani']))
	{
	?>

<div class = "player-info-body2">
		<h1 style = "font-size: 25px;">Update Banani Tournament Performances</h1>
		<hr>
        <div>
		<?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Player ID</th>";
        echo "<th>Name</th>";
        echo "<th>Points</th>";
        echo "<th>Time taken</th>";
        echo "</tr>";
		?>
		
		
		
				<?php
					
					$sql = $sql = "SELECT id, name, points,time_taken FROM player, participates where tour_id = 1 AND player.id = participates.player_id ";
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
				       
						?>
	
	   <form action = "admin_edit_tournament.php" method = "post">
	   
	   <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
	  
       <input  class = "input2" type="hidden" name="practise_no" value="<?php echo $row['practise_no']?>">
	   
	   <input  class = "input2" type="hidden" name="tour_id" value= 1>
       
	  <?php
	  echo "<tr>";
	  echo "<td>" . $row['id'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
      echo '<td><input class="input2" type="text" name="points" value="'. $row['points'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="time_taken" value="'. $row['time_taken'] .'"></td>';

	  echo "</tr>";
					}	
      echo "<table>";
      	  
	  ?>
	  
	  <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	  </div>
	  
		</div>
		</form>
		
		 <?php
					
		 }
	   ?>
		</div>
		
		
		
		 <?php
	if(isset($_POST['gulshan']))
	{
	?>

<div class = "player-info-body2">
		<h1 style = "font-size: 24px;">Update Gulshan Tournament Performances</h1>
		<hr>
        <div>
		<?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Player ID</th>";
        echo "<th>Name</th>";
        echo "<th>Points</th>";
        echo "<th>Time taken</th>";
        echo "</tr>";
		?>
		
		
		
				<?php
					
					$sql = $sql = "SELECT id, name, points,time_taken FROM player, participates where tour_id = 2 AND player.id = participates.player_id ";
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
				       
						?>
	
	   <form action = "admin_edit_tournament.php" method = "post">
	   
	   <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
	  
       <input  class = "input2" type="hidden" name="practise_no" value="<?php echo $row['practise_no']?>">
	   
	   <input  class = "input2" type="hidden" name="tour_id" value= 2>
       
	  <?php
	  echo "<tr>";
	  echo "<td>" . $row['id'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
	 echo '<td><input class="input2" type="text" name="points" value="'. $row['points'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="time_taken" value="'. $row['time_taken'] .'"></td>';

	  echo "</tr>";
					}	
      echo "<table>";
      	  
	  ?>
	  
	  <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	  </div>
	  
		</div>
		</form>
		
		 <?php
					
		 }
	   ?>
		</div>
		
		
		
		 <?php
	if(isset($_POST['uttara']))
	{
	?>

<div class = "player-info-body2">
		<h1 style = "font-size: 25px;">Update Uttara Tournament Performances</h1>
		<hr>
        <div>
		<?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Player ID</th>";
        echo "<th>Name</th>";
        echo "<th>Points</th>";
        echo "<th>Time taken</th>";
        echo "</tr>";
		?>
		
		
		
				<?php
					
					$sql = $sql = "SELECT id, name, points,time_taken FROM player, participates where tour_id = 3 AND player.id = participates.player_id ";
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
				       
						?>
	
	   <form action = "admin_edit_tournament.php" method = "post">
	   
	   <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
	  
       <input  class = "input2" type="hidden" name="practise_no" value="<?php echo $row['practise_no']?>">
	   
	   <input  class = "input2" type="hidden" name="tour_id" value = 3>
       
	  <?php
	  echo "<tr>";
	  echo "<td>" . $row['id'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
	  echo '<td><input class="input2" type="text" name="points" value="'. $row['points'] .'"></td>';
	  echo '<td><input class="input2" type="text" name="time_taken" value="'. $row['time_taken'] .'"></td>';

	  echo "</tr>";
					}	
      echo "<table>";
      	  
	  ?>
	  
	  <div style = "position: relative; right: 110px; top: 5px">
	  <button class = "button" type = "submit" name = "save" >Save</button>
	  <button class = "button" onclick="location.href='admin_home.php'" type="button"formnovalidate>Cancel</button>
	  </div>
	  
		</div>
		</form>
		
		 <?php
					
		 }
	   ?>
		</div>
		
	</div>	
</body>
</html>