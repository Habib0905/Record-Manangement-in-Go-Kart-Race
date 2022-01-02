
<?php
   
	include("connection.php");
	$query = "INSERT INTO performance(id, practise_no ,laptime, score, avg_score, percent_imp) Values('$_POST[insert_id]','$_POST[practise_no_hidden]','$_POST[laptime]','$_POST[score]' , '$_POST[avg_score]','$_POST[percent_imp]');";
	$query_run = mysqli_query($link,$query);
	
?>
 
    <script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "admin_home.php";
    </script>
	