<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$mode = $_POST['mode'];

		mysqli_query($con,"UPDATE reservation SET modeofpayment='$mode',r_status='pending' where rid='$id'")or die(mysqli_error($con)); 

$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $email=$row['r_email'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $ocassion=$row['r_ocassion'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "nhahang06n@gmail.com";
    
    $to = $email;
    
    $subject = "Chi tiết đặt bàn";
    
    $message = "Gửi $first $last. Dưới đây là chi tiết đặt chỗ của bạn với Nhà Hàng 06<br>
    	Mã Đặt Bàn: $rcode
    	Ngày: $date
    	Giờ: $time
    	Địa Điểm: $venue
    	Chủ Đề: $motif
    	Dịp: $ocassion
    	Tổng Thanh Toán: $payable
    	Gói: $combo
    	
    ";
    
    $headers = "Từ:" . $from;
    
    mail($to,$subject,$message, $headers);    
      echo "<script>document.location='summary.php'</script>";   
    
?> 
	
