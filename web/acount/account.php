<div class="content">
    <div class="container">
        <div class="box">
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM khachhang WHERE email='$email'";
                $query = $db->get_list($sql);
                $array = mysqli_fetch_array($query);
            ?>
                <div class="row-account">
                    <div class="left-container">
                        <div class="user-infor">
                            <img src="images/user-img.png" alt="">
                            <span><?php echo $array['ten_kh'] ?></span>
                        </div>
                        <div class="side-bar-content">
                            <ul>
                                <li class="slide-bar active"><a href="index.php?page=account"><span>Thông tin tài khoản</span></a></li>
                                <li class="slide-bar"><a href="index.php?page=manageBill"><span>Quản lý đơn hàng</span></a></li>
                                <li class="slide-bar"><a href="#" onclick="DangXuat()"><span>Đăng xuất</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-container">
                        <h3 class="title-content">Thông tin tài khoản</h3>
                        <div class="account-infor">
                            <div class="form-control">
                                <label for="" class="input-label">
                                    Họ & tên:
                                </label>
                                <?php echo $array['ten_kh'] ?>
                            </div>
                            <div class="form-control">
                                <label for="" class="input-label">
                                    Email:
                                </label>
                                <?php echo $array['email'] ?>
                            </div>
                            <div class="form-control">
                                <label for="" class="input-label">
                                    Số điện thoại:
                                </label>
                                <?php echo $array['sdt'] ?>
                            </div>
                            <div class="form-control">
                                <label for="" class="input-label">
                                    Địa chỉ:
                                </label>
                                <?php echo $array['diachi'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                function DangXuat() {
                  // Thực hiện các thao tác xác nhận đăng xuất ở đây
                  var confirmed = confirm('Bạn muốn đăng xuất');
                  var xacnhan = '';
                  if (confirmed) {
                    xacnhan = "index.php?page=logout";
                  } else {
                    xacnhan = "index.php?page=account";
                  }
                  window.location.href = xacnhan;
                }
                </script>
            <?php } ?>
        </div>
    </div>
</div>