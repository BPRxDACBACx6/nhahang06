<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];
	
	$date=date("Y-m-d");
	if ($amount<>0)
	{
		mysqli_query($con,"INSERT INTO payment(amount,rid,payment_date) 
			VALUES('$amount','$id','$date')")or die(mysqli_error());  
	}
		

		mysqli_query($con,"UPDATE reservation SET balance=balance-'$amount',r_status='$status' where rid='$id'")or die(mysqli_error($con)); 

$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=number_format($row['payable'],2);
        $ocassion=$row['r_ocassion'];
        $status=$row['r_status'];
        $email=$row['r_email'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];

        if ($status=='được xác nhận'){
        	$msg="Vui lòng thanh toán số dư $balance còn lại của bạn, trước sự kiện. Cảm ơn bạn!";
        }
        if ($status=='bị hủy bỏ'){
        	$msg="Xin lỗi!";
        }


	ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "nhahang06.com";
    
    $to = "$email";
    
    $subject = "Trạng thái đặt bàn";
    
    $message = "Gửi $first $last,

    Việc đặt bàn của bạn đã $status. $msg


    Cảm ơn,

    Nhà Hàng 06
    	
    ";
    
    $headers = "Từ:" . $from;
    
    mail($to,$subject,$message, $headers);
    	
			echo "<script type='text/javascript'>alert('Đã thêm thanh toán mới thành công!');</script>";
			echo "<script>document.location='pending.php'</script>";   
	
	
?>