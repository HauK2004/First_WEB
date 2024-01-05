<div class="page-header">
    <!-- Header content -->
</div>
<?php 
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];

$sql = "SELECT *
FROM sanpham
INNER JOIN giohang ON sanpham.ma_sp = giohang.ma_sp
INNER JOIN khachhang ON giohang.ma_kh = khachhang.ma_kh
WHERE khachhang.email='$email' AND giohang.tinhtrang='' AND giohang.level=''
ORDER BY sanpham.ma_sp DESC";
$query = $db->get_list($sql);
$count = mysqli_num_rows($query);
?>
<div class="container">
    <div class="cart-content mt30 mb30">
        <div class="title-header mb20">
            <h2 class="title">Giỏ Hàng</h2>
            <p><span class="text-blue"><?php echo $count ?></span> Đơn hàng trong giỏ hàng của bạn</p>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Act</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_array($query)) {
                    $gia_tien = $row['gia_sp'] - $row['gia_sp'] * $row['giam_gia'] / 100;
                    $tong = $gia_tien * $row['sl_sp_gh'];
                ?>
                <tr>
                    <td>
                        <div class="product-title item-center">
                            <img src="picture/<?php echo $row['anh_sp']?>" alt="">
                            <div>
                                <p style="margin-left: 20px;"><?php echo $row['ten_sp']?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="item-center"><?php echo $gia_tien ?>đ</div>
                    </td>
                    <td>
                        <div class="item-center">
                            
                                <div class="quantity">
                               <?php echo $row['sl_sp_gh']?>
                                </div>
                            
                    </td>
                    <td>
                        <div class="item-center text-red"><?php echo $tong?></div>
                    </td>
                    <td align="center">
                        <div style="margin-top: 10%;">
                            <a href="index.php?page=buy&ma_gh=<?php echo $row['ma_gh']?>" style="background-color: green; padding: 10px;">Mua hàng</a>
                            <a href="index.php?page=updatecart&ma_sp=<?php echo $row['ma_sp']?>" style="background-color: yellow; padding: 10px;">Số lượng</a>
                            <a href="index.php?page=delcart&ma_gh=<?php echo $row['ma_gh']?>" style="background-color: brown; padding: 10px;">Xóa</a>
                        </div>
                    </td>
                    <td>
                        <div class="item-center pinside10"><i class="far fa-trash-alt"></i></div>
                    </td>

                </tr>
                <?php }}else{
                    echo "<script>window.location.href='index.php?page=login'</script>";
                } ?>
            </tbody>
        </table>
    </div>
</div>