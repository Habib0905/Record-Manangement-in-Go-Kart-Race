

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">



</head>
 <body class = "sign-up-body">
 <div class="topnav">
 <img class = "logo" src = "logo.jpg" >
 </div>
  <div class = "login-form">
       <h1>Player Login</h1>
      <hr>
	  <form action="" method="post">
   
	  
	   <label for="email"><b>Email</b></label><br>
      <input type="text" placeholder="Enter Email" name="email" required> <br>
	  
	   <label for="password"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="password" required> <br>

      

 
	  
	  
	  <button class = "button" type = "submit" name = "submit" style = "margin-right: 19px;">Login</input>
	  <button class = "button" onclick="location.href='Loginpage.html'" type="button"formnovalidate>Cancel</button>
  </div>
      </form>
	  		<?php
			session_start();
			
			include("connection.php");
	        include("functions.php");
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				
				$sql = "select * from player where email = '$_POST[email]'";
				$result = mysqli_query($link,$sql);
				while ($user_data = mysqli_fetch_assoc($result)) {
					if($user_data['email'] == $_POST['email']){
						if($user_data['password'] == $_POST['password']){
							
					    $_SESSION['email'] = $user_data['email'];
						header("Location: player_home.php");
						die;
						}
						else{
							?>
							<span style = "color: white; position: relative; left:615px; top: 10px " >Wrong Password !!</span>
							<?php
						}
					}
				}
				
			}
		?>
 
 
 

 
 
 </body>
 
 
 
 </html>