<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	$id = $_POST['id'];
	$menu = $_POST['menu'];
	$cat = $_POST['cat'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	 
	 $image = $_FILES["image"]["name"];
		 if ($image=="")
		 {
			$name=$_POST['image1']; 
		 }
		else
		{
			$name = $_FILES["image"]["name"];
			$type = $_FILES["image"]["type"];
			$size = $_FILES["image"]["size"];
			$temp = $_FILES["image"]["tmp_name"];
			$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Lỗi khi tải tệp lên! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
					{
					die("Định dạng không được phép hoặc kích thước tệp quá lớn!");
					}
				else
					  {
					move_uploaded_file($temp, "../images/".$name);
					  }
					}
		}
	 mysqli_query($con,"UPDATE menu SET menu_name='$menu',cat_id='$cat',menu_desc='$desc',menu_price='$price',menu_pic='$name' where menu_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Đã cập nhật thành công chi tiết menu!');</script>";
		echo "<script>document.location='menu.php'</script>";
	
} 

