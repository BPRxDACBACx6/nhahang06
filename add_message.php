<?php
include 'includes/dbcon.php';
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$date = date("Y-m-d H:i:s");
	
	
		mysqli_query($con,"INSERT INTO messages(fullname,email,subject,message,date) 
			VALUES('$fullname','$email','$subject','$message','$date')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Đã gửi tin nhắn thành công, chúng tôi sẽ gửi email cho bạn để phản hồi, cảm ơn bạn!');</script>";
			echo "<script>document.location='messages.php'</script>";  	
	
?>