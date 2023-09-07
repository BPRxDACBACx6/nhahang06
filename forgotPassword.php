<?php
session_start();
include_once 'dbConnect.php';
if (isset($_POST['submit'])) {
 $email = mysqli_real_escape_string($conn, $_POST['email']);
    if ($email == "email") {
        $errormsg = "Nhập email hợp lệ";
    } else {
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '" . $email . "'");

       if (mysqli_num_rows($result) > 0) {  

  $res=mysqli_fetch_array($result);
  $to=$res['email'];
  $password = "";
  $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  
  for($i = 0; $i < 8; $i++)
  {
     $random_int = mt_rand();
     $password .= $charset[$random_int % strlen($charset)];
 }
  $subject='Quên mật khẩu';
  $message='Sử dụng mật khẩu này để đăng nhập: '.$password; 
  $headers='Từ: nhahang06@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    $errormsg='Kiểm tra mail của bạn';
    mysqli_query($conn,"update user set password='$password' where email='$email'");
  }
  else
  {
   $errormsg='Mail chưa được gửi';
  }
 }
 else
 {
  $errormsg='Mail bạn vừa nhập hiện không có';
 }
}
}

?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Đăng Nhập</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
           <link href="css/new.css" rel="stylesheet" type="text/css">
           
     <link href="css/home.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    </head>
<body class="background">
        <div>
        <a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
     
         <div id="settingLogin">
            <h1 style="top:-54%; position: absolute; left:15%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Quên Mật Khẩu</h1>
            <form action="" method="post" >
                <div>                               
                <label for="username">Email</label>
                <input type="text" name="email" width="200px" size="37" class="username" placeholder="Nhập email của bạn..." required> </div>
                <span><?php
                    if (isset($errormsg)) {
                        echo $errormsg;
                    }
                    ?></span><br>
                 <p class="login button"><input type="submit" name="submit" value="Đăng Nhập"/></p>
               
            </form>
         </div></div>
                </div>
        </div>
</body></html>

