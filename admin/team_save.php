<?php 

include('../includes/dbcon.php');
	
	$team = $_POST['team'];
	
	$result = mysqli_query($con,"SELECT team_name FROM team where team_name='$team'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO team(team_name) 
				VALUES('$team')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Đã thêm thành công nhóm mới!');</script>";
				echo "<script>document.location='teams.php'</script>";   
		}	
		else
		{
				echo "<script type='text/javascript'>alert('Nhóm đã được thêm vào!');</script>";
				echo "<script>document.location='teams.php'</script>";   
		}
	
?>