

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

      

 
	  
	  
	  <button class = "button" type = "submit" name = "submit" style = "margin-right: 19px;">Sign up</input>
	  <button class = "button" onclick="location.href='Loginpage.html'" type="button"formnovalidate>Cancel</button>
  </div>
      </form>
	  		<?php
			session_start();
			if(isset($_POST['submit'])){
				$link = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($link,"go-kart race");
				$query = "select * from account where Email = '$_POST[email]'";
				$query_run = mysqli_query($link,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['Email'] == $_POST['email']){
						if($row['Password'] == $_POST['password']){
							
							header("Location: admin_home.php");
						}
						else{
							?>
							<span style = "color: white; position: relative; left:685px; bottom: 65px " >Wrong Password !!</span>
							<?php
						}
					}
				}
				
			}
		?>
 
 
 

 
 
 </body>
 
 
 
 </html>