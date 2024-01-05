<?php
if(isset($_POST['xulidonhang'])){
    $name = $_POST['fname'] . ' ' . $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $textare = $_POST['textarea'];
    $ma_gh = $_POST['ma_gh'];

    $sql1 = "SELECT * FROM giohang WHERE ma_gh='$ma_gh'";
    $row = mysqli_fetch_array($db->query($sql1));
    $ma_kh = $row['ma_kh'];
    $ma_sp = $row['ma_sp'];

    $sql = "INSERT INTO hoadon (ma_hd, tenngnhan, email2, phone2, diachi, ghichu, ma_sp, ma_kh) 
            VALUES ('', '$name', '$email', '$phone', '$address', '$textare', '$ma_sp', '$ma_kh')";
  
  if ($db->query($sql)) {
    $sql1="SELECT*FROM hoadon ORDER BY ma_hd DESC";
    $query0=mysqli_fetch_array($db->query($sql1));
    $ma_hd=$query0['ma_hd'];
    $sql2 = "UPDATE giohang SET `level` = '', ma_hdx=$ma_hd WHERE ma_gh = $ma_gh";
    $db->query($sql2);
    // $hd = mysqli_fetch_array($db->query("SELECT ma_hd FROM hoadon ORDER BY ma_hd DESC LIMIT 1"))['ma_hd'];
    echo "<script>window.location.href='index.php?page=hoadon&ma_hd=" . $ma_hd . "'</script>";
}
    else{
        echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
    }
}
?>