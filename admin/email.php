<?php

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "nhahang06@gmail.com";
    
    $to = "dinhbaongoc@gmail.com";
    
    $subject = "Kiểm tra thư PHP";
    
    $message = "Món ăn ngon";
    
    $headers = "Từ:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "<script>
		alert('Kiểm tra Hộp thư đến Email của bạn để biết chi tiết');		
	</script>";
	header('location:http://nhahang06@gmail.com');
?>
