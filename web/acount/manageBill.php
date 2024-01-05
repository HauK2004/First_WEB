<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li>Thông tin tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="box">
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM khachhang WHERE email='$email'";
                $query = $db->query($sql);
                $array = mysqli_fetch_array($query);
            }
            ?>
            <div class="row-account">
                <div class="left-container">
                    <div class="user-infor">
                        <img src="images/user-img.png" alt="">
                        <span><?php echo $array['ten_kh']; ?></span>
                    </div>
                    <div class="side-bar-content">
                        <ul>
                            <li class="slide-bar"><a href="index.php?page=account"><span>Thông tin tài khoản</span></a></li>
                            <li class="slide-bar active"><a href="index.php?page=manageBill"><span>Quản lý đơn hàng</span></a></li>
                            <li class="slide-bar"><a href="#" onclick="DangXuat()"><span>Đăng xuất</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="right-container">
                    <h3 class="title-content">Đơn hàng đã đặt</h3>
                    <div>
                        <table class="table table-hover">
                            <tbody>
                                <?php 
                                if (isset($_SESSION['email'])) {
                                    $email = $_SESSION['email'];
                                    $sql1 = "SELECT *
                                        FROM hoadon 
                                        INNER JOIN khachhang ON hoadon.ma_kh = khachhang.ma_kh
                                        INNER JOIN sanpham ON hoadon.ma_sp = sanpham.ma_sp
                                        WHERE khachhang.email = '$email'";
                                    $result = $db->query($sql1);
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                ?>
                                <tr>
                                <td><div class="item-center"><?php echo $i; ?></div></td>
                                <td scope="row"><?php echo $row['ten_sp']; ?></td>
                                <td><a href="index.php?page=hoadon&ma_hd=<?php echo $row['ma_hd']; ?>">Xem chi tiết</a></td>
                                <?php
                                $hientrang = $row['hientrang'];
                                $ma_sp = $row['ma_sp'];

                                if ($hientrang == '') {
                                    echo '<td>Đang chờ xác nhận</td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" value="' . $row['ma_hd'] . '" name="ma_hd">
                                            <input type="submit" class="" value="Hủy đơn" name="del" style="max-height: 35px;">
                                        </form>
                                    </td>';
                                } else if ($hientrang == 'giaoxong') {
                                    echo '<td>Đã nhận hàng</td>
                                    <td>
                                        <a href="index.php?page=feekback&ma_sp=' . $ma_sp . '" value="Bình luận">Bình luận</a>
                                    </td>';
                                } else if ($hientrang == 'danggiao') {
                                    echo '<td>Đang giao</td>
                                    <td></td>';
                                } else {
                                    echo '<td>Đã hủy đơn</td>
                                    <td></td>';
                                }
                                ?>
                            </tr>
                                <?php 
                                }
                                if (isset($_POST['del'])) {
                                    $ma_hd = $_POST['ma_hd'];
                                    $sql = "DELETE FROM `hoadon` WHERE ma_hd=$ma_hd";
                                    $query = $db->query($sql);
                                    if ($query) {
                                        echo '<script> window.location.href="index.php?page=manageBill"; </script>';
                                    }
                                }
                            }
                            ?>                                 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>