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
  <title>Thông Tin Đặt Bàn</title>
  <style>
    .label{
      width:150px;
    }
    h4,h3{
      margin:0px;
    }
  </style>  
</head>

<body>
<h3 style="text-align:center">Nhà Hàng 06</h3>
<h4 style="text-align:center">18 phố Viên, Phường Đức Thắng, Quận Bắc Từ Liêm, TP Hà Nội</h4>
<h4 style="text-align:center">Liên hệ: 0987654321 | 0123456789</h4>
<h4 style="text-align:center">Email: nhahang06@gmail.com</h4>
<h4 style="text-align:center">Facebook: facebook.com/nhahang06 </h4>
<hr>

<table style="width:100%">
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
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $type=$row['r_type'];
        $team=$row['team_name'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
}
?>                      
                      <tr>
                        <td class="label">Mã Đặt Bàn: </td>
                        <td><?php echo $rcode;?></td>
                        <td class="label">Ngày Đặt Bàn: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td class="label">Tên: </td>
                        <td><?php echo $last." ,".$first;?></td>
                        <td class="label">Kiểu Đặt Bàn: </td>
                        <td><?php echo $type;?></td>
                      </tr>
                      <tr>
                        <td class="label">Liên Hệ: </td>
                        <td><?php echo $contact;?></td>
                        <td class="label">Địa Điểm: </td>
                        <td><?php echo $venue;?></td>
                      </tr> 
                      <tr>
                        <td class="label">Địa Chỉ: </td>
                        <td><?php echo $address;?></td>
                        <td class="label">Tổng Thanh Toán: </td>
                        <td><?php echo $payable;?></td>
                      </tr>   
                      <tr>  
                        <td class="label">Trạng Thái Đặt Bàn: </td>
                        <td><?php echo $status;?></td>
                        <td class="label">Balance: </td>
                        <td><?php echo $balance;?></td>
                      </tr>  
                      <tr>  
                        <td class="label">Nhóm Được Phân Công: </td>
                        <td><?php echo $team;?></td>
                        <td class="label">Mô Típ: </td>
                        <td><?php echo $motif;?></td>
                      </tr>  
</table>
<br>
<?php
    
    $query1=mysqli_query($con,"select * from r_details where rid='$id'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1))
      {
        $rid=$row1['r_details_id'];
?>
<div style="width:50%;float:left">
  <h4><?php echo $row1['combo_name'];?></h4>
  <span>Số Lượng Người: <?php echo $row1['r_nop'];?> * <?php echo $row1['r_price'];?> = P <?php echo $row1['r_nop']*$row1['r_price'];?></span>
  <ul>
<?php
      $query2=mysqli_query($con,"select * from r_combo where r_details_id='$rid'")or die(mysqli_error($con));
      while($row2=mysqli_fetch_array($query2))
      {
?>    
    <li><?php echo  $row2['menu_name'];?></li>
<?php }?>    
</div>
<?php }?>
</body>
</html>