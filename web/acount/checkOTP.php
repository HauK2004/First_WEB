<div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li>Quên mật khẩu</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- login-form -->

    <div class="content">
        <div class="forgot-container">
            <img src="images/otp-icon.png" alt="">
            <h1 class="title">Nhập mã OTP</h1>
            <p>Mã OTP được gửi qua email</p>
            <form action="" method="POST">
                <input type="text" class="field-email" placeholder="Nhập mã OTP" name="maOTP">
                <button type="submit" class="submit-email mb20" name="OTP">Tiếp tục</button>
            
            <a href="" class="text-blue" name="GuiLai">Gửi lại mã OTP</a>
            </form>
        </div>
    </div>
    <?php
if (isset($_POST['OTP'])) {
    $maOTP = $_POST['maOTP'];
    $rand = $_SESSION['radom']; // Corrected variable name

    if ($rand === $maOTP) {
        unset($_SESSION['radom']);
        echo "<script>window.location.href='index.php?page=login'</script>";
    } else {
        echo "Bạn đã nhập sai vui lòng nhập lại";
    }
}


?>