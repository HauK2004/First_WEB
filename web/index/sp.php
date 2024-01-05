<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Sản phẩm mới nhất</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        $sql1 = "SELECT * FROM sanpham WHERE anh_sp != '' ORDER BY ma_sp DESC LIMIT 1,4";
                        $kq1 = $db->get_list($sql1);
                        while ($row1 = mysqli_fetch_array($kq1)) {
                            $gia_tien1 = $row1['gia_sp'] - $row1['gia_sp'] * $row1['giam_gia'] / 100;
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="product-block">
                                    <div class="product-img"><img src="picture/<?php echo $row1['anh_sp'] ?>" alt=""></div>
                                    <div class="product-content">
                                        <h5><a href="index.php?page=detail&ma_sp=<?php echo $row1['ma_sp'] ?>" class="product-title"><?php echo $row1['ten_sp'] ?></a></h5>
                                        <div class="product-meta">
                                            <a href="#" class="product-price"><?php echo number_format($gia_tien1) ?>đ</a>
                                            <a href="#" class="discounted-price"><?php echo number_format($row1['gia_sp']) ?></a>
                                            <span class="offer-price"><?php echo $row1['giam_gia'] ?>% off</span>
                                        </div>
                                        <div class="shopping-btn">
                                            <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                            <a href="index.php?page=addcart&ma_sp=<?php echo $row1['ma_sp'] ?>" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.latest products -->
<!-- seller products -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Đang khuyến mãi</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM sanpham ORDER BY giam_gia DESC LIMIT 0,4";
                        $kq = $db->get_list($sql);
                        while ($row = mysqli_fetch_array($kq)) {
                            $gia_tien = $row['gia_sp'] - $row['gia_sp'] * $row['giam_gia'] / 100;
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="product-block">
                                    <div class="product-img"><img src="picture/<?php echo $row['anh_sp'] ?>" alt=""></div>
                                    <div class="product-content">
                                        <h5><a href="index.php?page=detail&ma_sp=<?php echo $row['ma_sp'] ?>" class="product-title"><?php echo $row['ten_sp'] ?></a></h5>
                                        <div class="product-meta">
                                            <a href="#" class="product-price"><?php echo number_format($gia_tien) ?>đ</a>
                                            <a href="#" class="discounted-price"><?php echo number_format($row['gia_sp']) ?></a>
                                            <span class="offer-price"><?php echo $row['giam_gia'] ?>% off</span>
                                        </div>
                                        <div class="shopping-btn">
                                            <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                            <a href="index.php?page=addcart&ma_sp=<?php echo $row['ma_sp'] ?>" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>