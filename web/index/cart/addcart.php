<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    if (isset($_GET['ma_sp'])) {
        $id = $_GET['ma_sp'];
        $so_luong = 1;

        // Kiểm tra sự tồn tại của sản phẩm trong giỏ hàng
        $check = "SELECT * 
                  FROM giohang 
                  WHERE ma_sp = $id AND ma_kh IN (SELECT ma_kh FROM khachhang WHERE email = '$email')";
        $result = $db->query($check);
        if ($result->num_rows > 0) {
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $row = $result->fetch_assoc();
            $ma_gh = $row['ma_gh'];
            $sql1 = "UPDATE giohang SET sl_sp_gh = sl_sp_gh + $so_luong WHERE ma_gh = $ma_gh";
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm vào
            $sql = "SELECT ma_kh FROM khachhang WHERE email = '$email'";
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            $ma_kh = $row['ma_kh'];
            $sql1 = "INSERT INTO giohang (sl_sp_gh, ma_sp, ma_kh) VALUES ($so_luong, $id, $ma_kh)";
        }

        if ($db->query($sql1) === TRUE) {
            echo "Thêm/cập nhật record thành công";
            echo "<script>window.location.href='index.php?page=cart'</script>";
        } else {
            echo "Lỗi: ";
        }
    } else {
        echo "<script>window.location.href='index.php?page=Login'</script>";
    }
} else {
    echo "<script>window.location.href='index.php?page=Login'</script>";
}
?>