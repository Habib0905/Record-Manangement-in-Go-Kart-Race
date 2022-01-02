
<?php
   
	include("connection.php");
	$query = "update player set name='$_POST[name]',dob='$_POST[dob]',email='$_POST[email]',country='$_POST[country]',phone='$_POST[phone]',brand='$_POST[brand]',sponsor='$_POST[sponsor]' where id = '$_POST[id]'";
	$query_run = mysqli_query($link,$query);
	
?>
	<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "player_info.php";
    </script>