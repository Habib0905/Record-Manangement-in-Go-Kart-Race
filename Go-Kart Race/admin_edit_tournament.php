
<?php


   
	include("connection.php");
	$query = "update participates set points='$_POST[points]',time_taken='$_POST[time_taken]' where player_id = '$_POST[id]' AND tour_id = '$_POST[tour_id]'";
	$query_run = mysqli_query($link,$query);
	
	

?>

    <script type="text/javascript">
	alert("Tournament data updated successfully.");
	window.location.href = "admin_home.php";
    </script>