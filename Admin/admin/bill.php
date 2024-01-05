<div class="container-fluid">
  <div class="border mt-3">
    <h4 class="text-center mt-3 mb-4">Quản lí đơn hàng</h4>
    <div class="row">

    </div>
    <table class="table table-hover table-text-center" id="receipt-table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã đơn hàng</th>
          <th scope="col">Mã khách hàng</th>

         
        
          <th scope="col">Chi tiết đơn hàng</th>
          <th scope="col" style="max-width: 40%;">Xác nhận đơn hàng</th>

        </tr>
      </thead>
      <tbody id="content-table">
<?php
$sql="SELECT *
FROM hoadon
INNER JOIN sanpham ON hoadon.ma_sp=sanpham.ma_sp
INNER JOIN khachhang ON hoadon.ma_kh=khachhang.ma_kh";
$query=$db->get_list($sql);
while($row=mysqli_fetch_array($query)){
?>
        <tr>

          <td><?php echo $row['ma_hd']?></td>
          <td><?php echo $row['tenngnhan']?></td>

         

          <td class="detail">
            <a  href='index.php?page=chitietsanpham&ma_hd=<?php echo $row['ma_hd']?>'> Chi tiết <i class="fa fa-external-link-alt"></i></a>
          </td>
          <td class="row">
          <center>
  <form method="POST">
    <input type="hidden" name="ma_hd" value="<?php echo $row['ma_hd']?>">
    <?php
    $hientrang = $row['hientrang'];

    if ($hientrang == '') {
      echo '
      <input type="submit" name="xacnhan" class="btn btn-primary ml-3 col-6 pr-4" value="Xác nhận đang giao">
      
      <input type="submit" name="huydon" class="btn btn-danger ml-1 col-5 pr-4" value="Hủy đơn hàng">';
    } else if ($hientrang == 'danggiao') {
      echo '
      <input type="submit" name="ghthanhcong" class="btn btn-warning ml-4 col-md-12 col-lg-12 col-sl-12" value="Nhận hàng">';
    } else if ($hientrang == 'giaoxong') {
      echo '<center>'.'<input type="submit" name="" class="btn btn-success ml-4 col-md-12 col-lg-12 col-sl-12" value="Đã giao hàng thành công">'.'</center>';
    } else {
      echo '<center>'.'<input type="submit" name="" class="btn btn-danger ml-4 col-md-12 col-lg-12 col-sl-12" value="Đơn đã được hủy">'.'</center>';
    }
    ?>

  </form>
</center>
        </tr>
        <?php   
        if(isset($_POST['xacnhan'])){
            $ma_hd=$_POST['ma_hd'];
            $sql2="UPDATE hoadon SET hientrang='danggiao' WHERE ma_hd=$ma_hd";
            $query2=$db->query($sql2);
            $sql3="UPDATE giohang SET level='dangiao' WHERE ma_hdx=$ma_hd";
            $query3=$db->query($sql3);
            echo '<script> window.location.href="index.php?page=donhang"; </script>';
        }
        if(isset($_POST['ghthanhcong'])){
            $ma_hd=$_POST['ma_hd'];
            $sql2="UPDATE hoadon SET hientrang='giaoxong' WHERE ma_hd=$ma_hd";
            $query2=$db->query($sql2);
            $sql3="UPDATE giohang SET level='giaoxong' WHERE ma_ghx=$ma_hd";
            $query3=$db->query($sql3);
            echo '<script> window.location.href="index.php?page=donhang"; </script>';
        }
        if(isset($_POST['huydon'])){
            $ma_hd=$_POST['ma_hd'];
            $sql2="UPDATE hoadon SET hientrang='dahuy' WHERE ma_hd=$ma_hd";
            $query2=$db->query($sql2);
            $sql3="UPDATE giohang SET level='dahuy' WHERE ma_hdx=$ma_hd";
            $query3=$db->query($sql3);
            echo '<script> window.location.href="index.php?page=donhang"; </script>';
        ?>
<?php }}?>
      </tbody>
    </table>

  
  </div>
</div>
