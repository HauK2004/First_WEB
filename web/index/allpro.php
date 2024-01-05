<div class="content">
        <div class="container">
           
               <center><h4>Tất cả sản phẩm</h4></center>
                <div class="col">
                <div class="row">
                        <?php
                        $sql="SELECT*FROM sanpham";
                        $kq=$db->get_list($sql);
                        while($row=mysqli_fetch_array($kq)){

                            $gia_tien=$row['gia_sp']-$row['gia_sp']*$row['giam_gia']/100;
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="picture/<?php echo $row['anh_sp']?>" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="index.php?page=detail&ma_sp=<?php echo $row['ma_sp']?>" class="product-title"><?php echo $row['ten_sp']?></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price"><?php echo $gia_tien?>đ</a>
                                        <a href="#" class="discounted-price"><?php echo $row['gia_sp']?></a>
                                        <span class="offer-price"><?php echo $row['giam_gia']?>%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="index.php?page=addcart&ma_sp=<?php echo $row['ma_sp']?>" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    
                        <!-- pagination close -->
                    
                </div>
            </div>
        </div>
    </div>