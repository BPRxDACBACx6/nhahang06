<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$team = $_POST['team'];


		mysqli_query($con,"UPDATE reservation SET team_id='$team' where rid='$id'")or die(mysqli_error($con)); 

			echo "<script type='text/javascript'>alert('Đã phân công nhóm thành công!');</script>";
			echo "<script>document.location='reservation.php'</script>";   
	
	
?>