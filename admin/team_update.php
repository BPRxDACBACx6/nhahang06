<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	$id = $_POST['id'];
	$team = $_POST['team'];
	
	 mysqli_query($con,"UPDATE team SET team_name='$team' where team_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Đã cập nhật thành công thông tin chi tiết của nhóm!');</script>";
		echo "<script>document.location='teams.php'</script>";
	
} 

