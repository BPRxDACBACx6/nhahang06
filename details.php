<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<?php include 'header.php';?>
    <script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>

<body>
  <?php include 'navbar.php';?>
  <?php include 'menu-tab.php';?>
  
    <div class = "content">
      <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class = "col-md-9 col-lg-9">
          <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Chi tiết đặt bàn</div>
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
                     <form class="form-horizontal" role="form" action="details_save.php" method="post">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Địa Điểm</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" name="venue"   rows="5"  id="Alton Place" placeholder="Nhập đầy đủ thông tin của địa điểm" required></textarea>
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Ngày</label>
                                  <div class="col-lg-5">
                                    <input type="text" id="datepicker" class="form-control" name="date" required>
                                    <span class = "label label-warning">Kiểm tra nếu ngày có sẵn</span>
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Thời Gian</label>
                                  <div class="col-lg-5">
                                    <div id="datetimepicker" class="input-append input-group dtpicker">
                                     
                    <input data-format="hh:mm A" class="form-control" type="time" name="time" id="datepicker" required="true">
                                      <span class="input-group-addon">
                                        <i data-time-icon="fa fa-clock-o" data-date-icon="fa fa-calendar" class="fa fa-clock-o"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Chủ Đề</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Hãy viết chủ đề của sự kiện" name="motif">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Dịp</label>
                                  <div class="col-lg-5">
                                    <select class="form-control select2 " id="exampleSelect1" name="ocassion" placeholder="Lựa chọn dịp" required>
                                      <option>Sinh Nhật</option>
                                      <option>Tiệc</option>
                                      <option>Đám Cưới</option>
                                    </select>
                                  </div>
                                </div>  
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Số Packages</label>
                                  <div class="col-lg-5">
                                    <input type="number" class="form-control" placeholder="Số Packages" name="pax">
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Kiểu</label>
                                  <div class="col-lg-2">
                                    <input type="radio" class="form-radio" name="type" value="buffet"> Buffet
                                  </div>
                                  <div class="col-lg-2">
                                    <input type="radio" class="form-radio" name="type" value="plated"> Dùng đĩa 
                                  </div>
                                </div>  
                               <div class="form-group">
    <label class="col-lg-2 control-label"></label>
        <div class="col-lg-5">
<?php
include('includes/dbcon.php');

    $query=mysqli_query($con,"select * from combo order by combo_name")or die(mysqli_error($con));
      $count=mysqli_num_rows($query);
      while ($row=mysqli_fetch_array($query)){
        $id=$row['combo_id'];
        $name=$row['combo_name'];
        $price=$row['combo_price'];

       
?>     


          <div class="col-md-6">
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><?php echo $name;?> - <?php echo $price;?> VNĐ</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                  <!-- Widget content -->
                  
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>

<?php

    $query1=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $cid=$row1['combo_details_id'];
        $menu_id=$row1['menu_id'];
        $menu_name=$row1['menu_name'];
        
?>                        
                    <tr>
                      <td><?php echo $menu_name;?></td>
                    </tr> 
                   
                
<?php }?>                    
                    
                  </tbody></table>

                  <div class="widget-foot text-center">
                    <input type="radio" id="inlineCheckbox1" value="<?php echo $id;?>" name="combo_id">
                  </div>
                </div>
              </div>

            </div>
              <!--end widget-->
            <?php }?>  
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
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



