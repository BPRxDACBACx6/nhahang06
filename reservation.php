<?php include 'header.php';?>

<body>
  <?php include 'navbar.php';?>
  <?php include 'menu-tab.php';?>
  
    <div class = "content">
      <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "col-md-9 col-lg-9">
          <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Tạo Đặt Bàn</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="reservation_save.php" method="post">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Tên</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Nhập tên của bạn..." name="first" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Họ</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Nhập họ của bạn..." name="last" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Địa Chỉ</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" placeholder="Nhập địa chỉ nhà riêng/cơ quan của bạn" name="address" required></textarea>
                                  </div>
                                </div>    


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Liên Hệ</label>
                                  <div class="col-lg-5">
                                    <input type="number" class="form-control" placeholder="Nhập thông tin liên hệ của bạn..." name="contact" required>
                                  </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Email</label>
                                  <div class="col-lg-5">
                                    <input type="email" class="form-control" placeholder="Nhập email của bạn..." name="email">
                                  </div>
                                </div>
                 <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox1" value="option1" required> Tôi đồng ý với <a href="#facilities" data-toggle="modal"> các điều khoản sử dụng</a> của Nhà Hàng 06
                                    </label>
                  </div>
                  </div>


                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default">Xóa</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Tiếp</button>
                                    
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>    
        </div>
        <?php include('right-sidebar.php');?>
      
             
    
    
      
      </div>  
    </div>
<?php include 'footer.php';?>   
<?php include 'script.php';?>
<script>
         $(function () {
         //Initialize Select2 Elements
         $(".select2").select2();
         

     })
    </script>
</body>
</html>



