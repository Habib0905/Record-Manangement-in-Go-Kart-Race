
<?php


   
	include("connection.php");
	$query = "update performance set practise_no='$_POST[practise_no]',laptime='$_POST[laptime]',score='$_POST[score]',avg_score='$_POST[avg_score]',percent_imp='$_POST[percent_imp]' where id = '$_POST[id]' AND practise_no ='$_POST[practise_no]'";
	$query_run = mysqli_query($link,$query);
	

?>
	
 