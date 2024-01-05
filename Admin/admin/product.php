<div class="container-fluid">
  <div class="mb-5 mt-3">
    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="mb-2">
                  <h4 class="text-center mt-3 mb-4">Danh sách sản phẩm</h4>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="index.php?page=addProduct">
                        <button data-toggle="tooltip" data-placement="top" title="Thêm sản phẩm" class="btn btn-success btn-add">
                          <i class="fas fa-plus-square"></i>
                        </button>
                      </a>
                      <table id="bootstrap-data-table" class="table table-hover table-text-center">
                        <thead class="thead-light">
                          <tr>
                            <th>Hình ảnh</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên</th>
                            <th data-toggle="tooltip" data-placement="top" title="Số lượng còn lại">SL đã nhập</th>
                            <th data-toggle="tooltip" data-placement="top" title="Số lượng đã bán">SL đã bán</th>
                            <th>Giá bán</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="content-table">
                          <?php
                          $sql = "SELECT * FROM sanpham";
                          $query = $db->get_list($sql);
                          while ($row = mysqli_fetch_array($query)) {
                            $slbd = $row['so_luong'];
                            $slbt = $slbd;
                          ?>
                            <tr>
                              <td style="max-width: 140px;">
                                <img src="../picture/<?php echo $row['anh_sp'] ?>" width="100px" height="100px" alt="">
                              </td>
                              <td><?php echo $row['ma_sp'] ?></td>
                              <td><?php echo $row['ten_sp'] ?></td>
                              <td><?php echo $row['so_luong'] . ' kg' ?></td>
                              <td>
                                <?php
                                $ma_sp = $row['ma_sp'];
                                $sql1 = "SELECT * FROM giohang WHERE ma_sp=$ma_sp AND level=3";
                                $query1 = $db->get_list($sql1);
                                if (mysqli_num_rows($query1) > 1) {
                                  $sl = 0;
                                  while ($row1 = mysqli_fetch_array($query1)) {
                                    $sl += $row1['sl_sp_gh'];
                                  }
                                  echo $sl . ' kg';
                                } else {
                                  echo '0';
                                }
                                ?>
                              </td>
                              <td class="color-price"><?php echo $row['gia_sp'] ?> đ</td>
                              <td class="row" style="border: none;">
                                <div style="margin: auto;">
                                  <a href="index.php?page=updateProduct">
                                    <button class="m-wTD btn btn-primary" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" data-toggle="modal" data-target="#editUser">
                                      <i class="txt-center fas fa-edit"></i>
                                    </button>
                                  </a>
                                  <form method="POST">
                                    <input type="hidden" value="<?php echo $row['ma_sp']; ?>" name="ma_sp">
                                    <button class="btn btn-danger sizeTh1" data-toggle="modal" data-target="#delete" data-toggle="tooltip" data-placement="top" title="Xóa" type="submit" name="delProduct">
                                      <i class="txt-center menu-icon fas fa-trash-alt"></i>
                                    </button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['delProduct'])) {
  $ma_sp = $_POST['ma_sp'];
  $sqlDel = "DELETE FROM sanpham WHERE ma_sp = $ma_sp";
  $query = $db->query($sqlDel);
  if($query===true){
    echo '<script> window.location.href="index.php?page=product"; </script>';
  }
}
