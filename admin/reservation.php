<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Danh Mục</title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="index.html" class="navbar-brand hidden-lg">Nhà Hàng 06</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>
  <!-- Main content starts -->

<div class="content" style="margin-top:20px">

    <!-- Sidebar -->
    <?php include('../includes/sidebar.php');?>

    <!-- Sidebar ends -->

        <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i>Bảng Điều Khiển</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i>Trang Chủ</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Bảo Trì</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Danh Mục</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->


      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Đặt Bàn Được Chấp Nhận
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Mã</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Liên Hệ</th>
                        <th>Sự Kiện</th>
                        <th>Ngày</th>
                        <th>Địa Điểm</th>
                        <th>Nhóm</th>
                        <th>Balance</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Hành Động</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from reservation left join team on reservation.team_id=team.team_id where r_status='Approved'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['rid'];
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $email=$row['r_email'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $type=$row['r_ocassion'];
        $team=$row['team_name'];
?>                      
                      <tr>
                        <td><?php echo $rcode;?></td>
                        <td><?php echo $last;?></td>
                        <td><?php echo $first;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $venue;?></td>
                        <td><?php echo $team;?></td>
                        <td><?php echo $balance;?></td>
                        <td><?php echo $row['modeofpayment'];?></td>
                        <td>
                              <a href="#payment" class="btn btn-default" data-target="#payment<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-money bgreen"></i>
                              </a>
                              <a href="reservation_view.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                              </a>
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#assign" class="btn btn-info" data-target="#assign<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-user"></i>
                              </a>
                        </td>
                      </tr>
<!-- Modal -->
<div id="payment<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Thêm Phương Thức Thanh Toán</h4>
            </div>
            <div class="modal-body" style="height:150px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="payment_save.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Thanh Toán</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="amount" id="title" placeholder="Nhập số tiền...">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Trạng Thái</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="status">
                                <option>Đang Xử Lý</option>
                                <option>Đã Hoàn Tất</option>
                               <option>Đã Bị Hủy</option>
                        </select>
                      </div>
                  </div> 

                  
                              
                  <!-- Buttons -->
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Cập Nhật</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Đóng</button>
                  </div>  
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Cập Nhật Chi Tiết Đặt Bàn</h4>
            </div>
            <div class="modal-body" style="height:300px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="reservation_update.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Họ</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="last" id="title" value="<?php echo $last;?>" placeholder="Nhập họ của bạn...">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Tên</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="first" id="title" value="<?php echo $first;?>" placeholder="Nhập tên của bạn...">
                      </div>
                  </div> 
                  <div class="form-group">
                                  <label class="col-lg-4 control-label">Địa Chỉ</label>
                                  <div class="col-lg-8">
                                    <textarea class="form-control" rows="5" placeholder="Nhập địa chỉ nhà riêng/cơ quan của bạn..." name="address"><?php echo $address;?></textarea>
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Liên Hệ</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Nhập thông tin liên hệ của bạn..." name="contact" value="<?php echo $contact;?>" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email" class="form-control" placeholder="Nhập email của bạn..." name="email" value="<?php echo $email;?>" >
                                  </div>
                                </div>
                              
                  <!-- Buttons -->
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Cập Nhật</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Đóng</button>
                  </div>  
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->   
<!-- Modal -->
<div id="assign<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Phân Công Nhóm</h4>
            </div>
            <div class="modal-body" style="height:120px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="assign_save.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Nhóm</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="team">
                         <?php

                              $result = mysqli_query($con,"SELECT * FROM team ORDER BY team_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['team_id'];?>"><?php echo $row['team_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Buttons -->
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Cập Nhật</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Đóng</button>
                  </div>  
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
         
<?php }?>
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>

    <!-- Matter ends -->


    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php include('../includes/footer.php');?>  

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- Modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Thêm Menu Mới</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="menu_save.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Tên Menu</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Nhập tên menu...">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Danh Mục</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat">
                         <?php
                            include('../includes/dbcon.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Loại</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="subcat">
                         <?php

                              $result = mysqli_query($con,"SELECT * FROM subcategory ORDER BY subcat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['subcat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Mô Tả</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Nhập mô tả..."></textarea>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Giá</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Nhập giá...">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Ảnh</label>
                      <div class="col-lg-8"> 
                        <input type="file" class="form-control" name="image" id="title">
                      </div>
                  </div> 

                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Đóng</button>
                       </div>
                  </div>
              </form>
              <!--end form-->
            </div>
            
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error());
  echo "<script>document.location='pending.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>