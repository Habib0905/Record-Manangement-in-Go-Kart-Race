<?php

function check_login($link)
{

	if(isset($_SESSION['email']))
	{

		$email = $_SESSION['email'];
		$sql = "select * from player where email = '$email' limit 1";

		$result = mysqli_query($link,$sql);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		
	
	}
	header("Location: Loginpage.html");
	die;

}
function check_adminlogin($link)
{

	if(isset($_SESSION['email']))
	{

		$email = $_SESSION['email'];
		$sql = "select * from admin where email = '$email' limit 1";

		$result = mysqli_query($link,$sql);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		
		header("Location: Loginpage.html");
	    die;

	}
	    header("Location: Loginpage.html");
	    die;
}
?>

