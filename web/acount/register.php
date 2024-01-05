

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li>Đăng ký</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="box" style="margin-left: 30%;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <!-- form -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                    <h3 class="mb10">Tạo tài khoản</h3>
                                    <p>Vui lòng điền đầy đủ các thông tin bên dưới</p>
                                </div>
                                <form method="POST">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="name">

                                            </label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="phone"></label>
                                            <input id="phone" name="phone" type="text" class="form-control"
                                                placeholder="Điện thoại" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <input id="email" name="email" type="text" class="form-control"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label  sr-only" for="password"></label>
                                            <input id="password" name="password" type="password" class="form-control"
                                                placeholder="Mật khẩu" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label  sr-only" for="re_password"></label>
                                            <input id="re_password" name="re_password" type="password"
                                                class="form-control" placeholder="Xác nhận mật khẩu" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                        <button class="btn btn-primary btn-block mb10" type="submit" name="DangKy">Đăng Ký</button>
                                        <div>
                                            <p>Bạn đã có tài khoản?<a href="index.php?page=Login"> Đăng Nhập</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
   <?php
   if (isset($_POST['DangKy'])) {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['re_password'];

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
    $sql = "SELECT * FROM khachhang WHERE email = '$email'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Email đã tồn tại, thực hiện đăng nhập
      echo "<center><h4>Mail đã tồn tại</h4></center>";
    } else {
        // Email chưa tồn tại, tiếp tục xử lý đăng ký
        if ($password === $rePassword) {
            // Xử lý dữ liệu và thực hiện câu lệnh INSERT INTO
            $randomDigits = generateRandomDigits();
            $_SESSION['radom'] = $randomDigits;

            $sql = "INSERT INTO khachhang (ma_kh, ten_kh, email, diachi, sdt, pass)
                    VALUES (NULL, '$name', '$email', '', '$phone', '$password')";

            if ($db->query($sql) === TRUE) {
                // Chuyển hướng đến trang thành công
                $_SESSION['mailer']=$email;
                sendMail($email, 'The OTP Code is:', $randomDigits);
                header('Location: index.php?page=checkOTP');
                exit;
            } else {
                echo "Mật khẩu không khớp";
            }
        } else {
            echo "<center><h4>Mật khẩu không khớp</h4></center>";
        }
    }
}
?>