<?php
if(isset($_GET['ma_gh']))
{
$id = $_GET['ma_gh'];
$sql1 = "DELETE FROM `giohang` WHERE ma_gh=$id";
$db->query($sql1);
if(!$db->query($sql1)){
    echo "Quần què gì vậy trời";
}
echo "<script>window.location.href='index.php?page=cart'</script>";
}
else{
    Echo "Lỗi";
}
?>