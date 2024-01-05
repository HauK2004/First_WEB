<?php 
if(isset($_GET['ma_hd'])){
    $ma_hd=$_GET['ma_hd'];
    $sql="
    SELECT *
    FROM sanpham
    JOIN giohang ON sanpham.ma_sp = giohang.ma_sp
    JOIN khachhang ON giohang.ma_kh = khachhang.ma_kh
    JOIN hoadon ON giohang.ma_sp = hoadon.ma_sp AND giohang.ma_kh = hoadon.ma_kh
    WHERE hoadon.ma_hd=$ma_hd;
    ";
    $query=mysqli_fetch_array($db->get_list($sql));
}
?>

<div class="content">
        <div class="container">
            <div class="box">
                    <div class="ri-container">
                        <h3 class="title-content">Đơn hàng đã đặt/ Chi tiết đơn hàng</h3>
                        <div class="receipt-infor-details">
                            <div class="title-receipt">
                                <div class="left-content content" style="min-width: 40%;">
                                    <h4>ĐƠN HÀNG</h4>
                                    <p class="receipt-id">Mã đơn hàng: <?php echo $query['ma_hd'].'2024'?></p>
                                    <p class="receipt-time">Đặt hàng: 10/10/2021</p>
                                </div>
                                <p></p>
                                <div class="right-content content" style="min-width: 59%;">
                                    <h4>THÔNG TIN NHẬN HÀNG</h4>
                                    <p>Tên người nhận hàng:<strong><?php echo $query['tenngnhan']?></strong></p>
                                    <p>Số điện thoại: <strong><?php echo $query['phone2']?></strong></p>
                                    <p class="address">Địa chỉ người nhận:<?php echo $query['diachi']?></p>
                                </div>
                            </div>
                            <table class="table" style="max-width: 101%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="product-title">
                                                <img src="picture/<?php echo $query['anh_sp']?>" alt="">
                                                <div>
                                                    <p><?php echo $query['ten_sp']?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><div class="item-center"><?php echo $query['gia_sp']?></div></td>
                                        <td><div class="item-center"><?php echo $query['sl_sp_gh']?></div></td>
                                        <td><div class="item-center"><?php echo $query['sl_sp_gh']*$query['gia_sp']?></div></td>
                                    </tr>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td scope="row"></td>
                                        <td></td>
                                        <td scope="row">
                                            <div>
                                                <p>Tổng tiền:</p>
                                                <p>Phí vận chuyển:</p>
                                                <p>Tổng thanh toán:</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p><?php echo $query['sl_sp_gh']*$query['gia_sp']?>đ</p>
                                                <p>30 000đ</p>
                                                <p><?php echo $query['sl_sp_gh']*$query['gia_sp']+30000 ?>đ</p>
                                            </div>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                            <a href="index.php?page=manageBill" class="redirect-to-receipt text-blue"><i class="fas fa-long-arrow-alt-left"></i> Danh sách đơn hàng</a>
                        </div>
                    </div>
                    <!-- /.features -->
                </div>
            </div>
        </div>
    </div>