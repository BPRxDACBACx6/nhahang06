<!DOCTYPE html>
<?php
session_start();
include_once 'dbConnect.php';
$error = false;
if (isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone= mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address= mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
        $error = true;
        $fname_error = "*Tên chỉ được chứa bảng chữ cái và khoảng trắng.";
    }
    if (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
        $error = true;
        $lname_error = "*Họ chỉ được chứa bảng chữ cái và khoảng trắng.";
    }
     if (!preg_match("/^[0-9]+$/", $phone)) {
        $error = true;
     $phone_error = "*Số điện thoại chỉ được chứa số.";}
    
    if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        $error = false;
        $email_error = "*Vui lòng nhập email hợp lệ.";
    }
     if (!preg_match("/^\s*\S+(?:\s+\S+){2}/", $address)) {
        $error = true;
        $address_error = "*Vui lòng nhập địa chỉ hợp lệ.";
    }
       if (strlen($password) < 8) {
        $error = true;
        $password_error = "*Mật khẩu phải có ít nhất 6 ký tự.";
    }
    if ($password != $cpassword) {
        $error = true;
        $cpassword_error = "*Mật khẩu và Xác nhận mật khẩu không trùng khớp.";
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO user(email, firstName, lastName, phone, address, password) VALUES('" . $email . "', '" . $firstname . "', '" . $lastname . "','" . $phone . "','" . $address . "', '" . $password . "')")) {
            $successmsg = "Bạn đã đăng nhập thành công. <a href='login.php'>Nhấn vào đây để đăng nhập</a>.";
        } else {
            $errormsg = "Đã xảy ra lỗi khi đăng nhập. Vui lòng thử lại sau.";
        }
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
       <link href="css/home.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/new.css" rel="stylesheet" type="text/css">
    <header> </header>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </head>
    <body>
        <div id="background">
        <a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
     
         <div id="setting">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerform">
                        <h1>Đăng Ký Tại Đây</h1>
                        <div>
                           Tên:<input type="text" width=200px class="text" name="firstname" size="37"placeholder="Nhập tên của bạn..." required value="<?php if ($error) echo $firstname; ?>"  id="active"/>
                        <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($fname_error)) echo $fname_error; ?></p>
                        </div>
                        <div>
                            Họ:<input type="text" width=200px  class="text" name="lastname" size="37" placeholder="Nhập họ của bạn..." required value="<?php if ($error) echo $lastname; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($lname_error)) echo $lname_error; ?></p>
                        </div>
                       <div>Email:<input type="text"  width=200px class="text" name="email" placeholder="Nhập email của bạn..." required value="<?php if ($error) echo $email; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($email_error)) echo $email_error; ?></p>
                             </div>
                        <div>
                             Số Điện Thoại:<input type="text"  width=200px class="text" name="phone" size="37" placeholder="Nhập số điện thoại của bạn..." required value="<?php if ($error) echo $phone; ?>"/>
                             <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($phone_error)) echo $phone_error; ?></p>
                        </div>
                             <div>Địa Chỉ: <input type="text"  width=200px class="text" name="address" size="37" placeholder="Nhập địa chỉ nhà riêng/cơ quan của bạn..." required value="<?php if ($error) echo $address; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($address_error)) echo $address_error; ?></p>
                             </div>
                        
                        <div>Mật Khẩu:<input type="password"  width=200px class="text" name="password" size="37" placeholder="Nhập mật khẩu của bạn..." required>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($password_error)) echo $password_error; ?></p>
                             </div>
                        <div>Nhập Lại Mật Khẩu:<input type="password" width=200px  class="text" size="37" name="cpassword" placeholder="Nhập lại mật khẩu của bạn..." required>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($cpassword_error)) echo $cpassword_error; ?> </p>
                        </div>
                        <p class="login button">  
                        <input type="submit"  style="font-size:20px; font-weight: bold; " name="register" value="Đăng Ký"/>
                                        
                        </p>

                                    <div> 
                                        <span style="color: white;" ><?php
                                            if (isset($successmsg)) {
                                                echo $successmsg;
                                            }
                                            ?></span>
                                        <span style="color: #FF0000;"><?php
                                            if (isset($errormsg)) {
                                                echo $errormsg;
                                            }
                                            ?></span>
                                    </div>
                                    </form>
                                   
         </div></div></div></div>
                                    </body>
                                    </html>
