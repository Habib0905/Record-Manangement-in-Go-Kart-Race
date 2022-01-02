<?php 


	include("connection.php");
	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
		$password_repeat = $_POST['password_repeat'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $brand = $_POST['brand'];
        $sponsor = $_POST['sponsor'];

		if($password == $password_repeat)
		{	
			$sql = "INSERT INTO player(name, email, phone, password,dob, country, brand,sponsor) Values('$name', '$email', '$phone','$password', '$dob', '$country', '$brand', '$sponsor')";

			mysqli_query($link, $sql);
			?>
    <script type="text/javascript">
	alert("Player added successfully.");
	window.location.href = "admin_home.php";
    </script>
		<?php	
		}
         else
		{?>
			<span style = "color: white; position: relative; left:470px; bottom: 990px " >Confirmation password did not match with your password</span>
			<span style = "color: white; position: relative; left: 200px; bottom: 970px " >Please try again</span>
			<script type="text/javascript">
	alert("Confirmation Password is wrong. Please try again");
	window.location.href = "admin_home.php";
    </script>
		<?php
		}		
		
	}
?>

