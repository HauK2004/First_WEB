<div class="container-fluid">
  <div class="container mt-4">
    <h2><center>Thêm sản phẩm</center></h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-6 space-top">
          <h5 class="spacing_form">Tên sản phẩm</h5>
          <div class="input-group mb-2">
          
            <input type="text" class="form-control py-4" value="" placeholder="Nhập tên sản phẩm" name="ten_sp">
          </div>
        </div>
        <div class="col-6 space-top">
          <h5 class="spacing_form">Giá bán (VND)</h5>
          <div class="input-group mb-2">
           
            <input type="number" class="form-control py-4" value="" placeholder="20.000.000" name="gia_sp">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6 space-top">
          <h5 class="spacing_form">Số lượng</h5>
          <div class="input-group mb-2">
           
            <input type="number" class="form-control py-4" value="" placeholder="Nhập số lượng" name="so_luong">
          </div>
        </div>
        <div class="col-6 space-top">
          <h5 class="spacing_form">Giảm giá</h5>
          <div class="input-group mb-2">
         
            <input type="" class="form-control py-4" value="" placeholder="20.000.000" name="giam_gia">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6 space-top">
          <h5 class="spacing_form">Hình ảnh</h5>
          <input type="file" class="form-control" value="" name="anh_sp">
        </div>
        <div class="col-6 space-top">
        </div>
      </div>

      <hr>

      <div class="row" style="margin-top: 60px;">
        <input class="btn btn-primary col-sm-3 row space-top space-bottom" type="submit" value="Thêm sản phẩm" name="addP">
      </div>
    </form>
  </div>
</div>

<?php
if(isset($_POST['addP'])){
    $ten_sp=$_POST['ten_sp'];
    $gia_sp=(int)$_POST['gia_sp'];
    $anh_sp=$_FILES['anh_sp']['name'];
    $tmp=$_FILES['anh_sp']['tmp_name'];
    $upload_path = '../picture/'. $anh_sp;
    $so_luong=(int)$_POST['so_luong'];
    $giam_gia=(int)$_POST['giam_gia'];
    move_uploaded_file($tmp, $upload_path);
    $sql="INSERT INTO `sanpham`(`ma_sp`, `anh_sp`, `ten_sp`, `gia_sp`, `giam_gia`, `so_luong`) VALUES ('','$ten_sp',$gia_sp,'$anh_sp',$so_luong,$giam_gia)";
    $query=$db->query($sql);
    if($query){
        echo "";
    }
    else{
        echo "maudweihrftgfjoekds";
    }


}
?>