<?php include 'header.php';?>

<body>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
		<div class = "content">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-8 col-lg-8">
					<div class = "widget">
						<div class = "widget-head">
						    Bản Đồ Vị Trí Cửa Hàng
						</div>
						<div class = "widget-content">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9796.949139180737!2d105.77539097462412!3d21.06920893192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1670747809167!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>						</div>
					</div>				
				</div>
				<br>
<br>
<br>
				<div class = "col-md-4 col-lg-4">
					<div class = "widget">
						<div class = "widget-head">
							Tin nhắn/Phản hồi
						</div>
						<div class = "widget-content">
							<div class = "padd">
								<form class="form-horizontal" action = "add_message.php" method="post">                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Họ Tên</label>
                                  <div class="col-lg-8">
                                    <input name = "fullname" type="text" class="form-control" placeholder="Nhập họ tên của bạn" required >
                                  </div>
                                </div>                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email"  name = "email" class="form-control" placeholder="Nhập email của bạn" required>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Vấn Đề</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "subject" class="form-control" placeholder="Nhập vấn đề bạn muốn" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Bình Luận</label>
                                  <div class="col-lg-8">
                                    <textarea name = "message" class="form-control" rows="5" placeholder="Nhập bình luận tại đây"required></textarea>
                                  </div>
                                </div>
								<div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-8">
                                    <button  class="btn btn-sm btn-success btn-block">Gửi</button>                                  
                                  </div>
                                </div>
                              </form>

						</div>
						</div>
					</div>		
				</div>				
					
		</div>
		<div class = "content">
			<div class = "col-lg-12 col-md-12  col-sm-12">
				<div class = "col-lg-12 col-md-12 col-sm-12 ">
					<div class = "title-header">
						
					</div>					
				</div>
				<br/>
				<br/>
				<br/>
				<div class = "col-lg-3 col-md-3 col-sm-3">
					
				</div>
				
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
</body>
</html>



