<?php 

include('../includes/dbcon.php');
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	
	
		mysqli_query($con,"INSERT INTO user(full_name,username,password,status) 
			VALUES('$name','$username','$password','active')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Đã thêm thành công người dùng quản trị viên mới!');</script>";
			echo "<script>document.location='user.php'</script>";   
	
	
?>