<div class="content">
    <?php
    if(isset($_GET['ma_gh'])){
        $ma_gh=$_GET['ma_gh'];
    }
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="box checkout-form">
                        <!-- checkout - form -->
                        <div class="box-head">
                            <h2 class="head-title">Thông tin của bạn</h2>
                        </div>
                        <div class="box-body">
                            <div class="row">
                            <form method="POST" action="index.php?page=xulidonhang">
                            <input type="hidden" name="ma_gh" value="<?php echo $ma_gh; ?>">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="fname"></label>
                                    <input name="fname" type="text" class="form-control" placeholder="Họ" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="name"></label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="email">Email</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Địa chỉ email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="phone"></label>
                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Số điện thoại" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only"></label>
                                    <input name="address" type="text" class="form-control" placeholder="Địa chỉ" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="textarea"></label>
                                    <textarea class="form-control" id="textarea" name="textarea" rows="4" placeholder="Ghi chú"></textarea>
                                </div>
                                <button type="submit" name="xulidonhang" class="btn btn-primary">Xác nhận thanh toán</button>
                            </div>
                        </form>
                                <!-- /.checkout-form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product total -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box mb30">
                        <div class="box-head">
                            <h3 class="head-title">Đơn hàng của bạn</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <!-- product total -->
            <?php 
           $sql = "SELECT *
           FROM giohang
           INNER JOIN sanpham ON giohang.ma_sp = sanpham.ma_sp
           WHERE giohang.ma_gh = $ma_gh";
           $query = mysqli_fetch_array($db->query($sql));
            

            ?>
                                <div class="pay-amount ">
                                    
                                    <table class="table mb20">
                                        <thead class=""
                                            style="border-bottom: 1px solid #e8ecf0;  text-transform: uppercase;">
                                            <tr>
                                                <th>
                                                    <span>Sản phẩm</span>
                                                </th>
                                                <th>
                                                    <span>Giá tiền</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <span><?php echo $query['ten_sp'].'x'. $query['sl_sp_gh']?></span>
                                                </th>
                                                <td><?php echo $query['gia_sp'].'đ'?></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span><?php echo 'Vận chuyển'?></span>
                                                </th>
                                                <td><?php echo '30.000đ'?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <span>Tổng thanh toán</span>
                                                </th>
                                                <td><?php echo $query['gia_sp']* $query['sl_sp_gh']+30000?> đ</td>
                                            </tr>
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
