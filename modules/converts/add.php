<?php
	include("../../connect.php");
	$user_id=mysqli_real_escape_string($con, $_POST['user_id']);
	$query="UPDATE users SET status='member' WHERE user_id='$user_id'";
	$execute=mysqli_query($con, $query);
	if($execute){
		echo "Successfully Added To Members";
	}else{
		echo "error".mysqli_error($con);
	}

?>