<div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li>Chi tiết sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- product-single -->
    <div class="content">

        <?php
        $ma_sp = $_GET['ma_sp'];
        $sql = "SELECT * FROM sanpham WHERE ma_sp = $ma_sp";
        $result = $db->get_list($sql);
        $array = mysqli_fetch_array($result);
       
        ?>
      <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <!-- product-description -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                            <div class=""><img src="picture/<?php echo $array['anh_sp']; ?>" alt="" style="width:60%; margin-left: 20%;"></div>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="product-single">
                                <h2><?php echo $array['ten_sp']; ?></h2>
                                <div class="product-rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span class="text-secondary">&nbsp;(12 reviews)</span>
                                </div>
                                <p class="product-price" style="font-size: 25px;">25,350,000đ<strike style="color:rgba(128, 128, 128, 0.658); font-size: 18px;">27,990,000đ</strike></p>
                                <form method="POST">
                                <div class="product-quantity">
                                    <h4>Quantity</h4>
                                    <div class="quantity mb20">
                                        <input class="btn-quantity decrease-quantity" onclick="decreaseQuantity()" type="button" value="-">
                                        <input type="number" max="10" min="1" name="quantity" value="1" class="quantity-input" id="quantity-input">
                                        <input class="btn-quantity increase-quantity" onclick="increaseQuantity()" type="button" value="+">
                                    </div>
                                    <span class="rest-quantity">5 items available</span>
                                </div>
                                <div>
                                    <a href="index.php?page=addcart&ma_sp=<?php echo $array['ma_sp']?>" class="btn btn-default btn-buy-now">
                                        Thêm vào giỏ hàng
                                    </a>
                                    <button type="submit" class="btn btn-default" name="addToCart">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;Mua ngay
                                    </button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentQuantity = parseInt(quantityInput.value);
        var maxQuantity = parseInt(quantityInput.max);
        if (currentQuantity < maxQuantity) {
            quantityInput.value = currentQuantity + 1;
        }
    }
</script>
<?php
if(isset($_POST['addToCart']) && isset($_SESSION['email'])){
    $ma_kh = $_SESSION['ma_kh'];
    $so_luong = $_POST['quantity'];
    $sql = "INSERT INTO giohang (sl_sp_gh, ma_kh, ma_sp,tinhtrang) VALUES ('$so_luong', '$ma_kh', '$ma_sp',1)";
    $query = $db->query($sql);
    if($query){
        $sql = "SELECT * FROM giohang ORDER BY ma_kh DESC LIMIT 1";
        $result = $db->get_list($sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $ma_gh = $row['ma_gh'];
            echo "<script>window.location.href = 'index.php?page=buy&ma_gh=" . $ma_gh . "';</script>";
        }
    }
}
?>


        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box-head scroll-nav">
                        <div class="head-title">
                           
                            <a class="page-scroll active" href="#rating">Đánh giá và nhận xét</a>
                            <a class="page-scroll" href="#review">Thêm nhận xét</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highlights -->
            
            <!-- rating reviews  -->
            <div id="rating">
            <div id="review">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="box">
                                <div class="box-head">
                                    <h3 class="head-title">Đánh giá và nhận xét của bạn</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="review-form">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 review-left">
                                                <div class="review-rating">
                                                    <h4>Đánh giá của bạn về sản phẩm này</h4><br />
                                                    <div class="star-rate" id="rateYo"></div>
                                                </div>
                                            </div>
                                            <form class="review-right">
                                               
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label sr-only " for="textarea"></label>
                                                        <textarea class="form-control" id="textarea" name="textarea"
                                                            rows="4" placeholder="Mời bạn nhập bình luận"></textarea>
                                                    </div>
                                                    <button id="submit" name="singlebutton" class="btn btn-primary">Gửi
                                                        đánh giá</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="box container-rating-review">
                            <div class="box-head">
                                <h3 class="head-title">Đánh giá và nhận xét</h3>
                            </div>
                            <div class="box-body">
                                <div class="row  rating-box">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="rating-review">
                                            <div class="">
                                                <h1 class="score-rating">4</h1>
                                            </div>
                                            <div>
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                                <p class="text-secondary">12 nhận xét</p>
                                            </div>
                                        </div>
                                        <div class="rating-view-details">
                                            <div class="rating-level">
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                                <span>12</span>
                                            </div>

                                            <div class="rating-level">
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                                <span>0</span>
                                            </div>
                                            <div class="rating-level">
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                                <span>0</span>
                                            </div>

                                            <div class="rating-level">
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                                <span>0</span>
                                            </div>
                                            <div class="rating-level">
                                                <div class="product-rating">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                                <span>0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row review-box">
                                    <div class="customer-reviews">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="reviews-text"><span class="text-default">Nika Nguyen</span> </p>
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <p>Giao hàng siêu đúng hẹn, hàng cũng được đóng gói cẩn thận.
                                                Hiện tại mình xài được vài bữa thì không bị vấn đề gì.
                                                Hàng của shopdunk thì không lo về chất lượng.</p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="divider-line"></div>
                                        </div>
                                    </div>
                                    <div class="customer-reviews">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="reviews-text"> <span class="text-default">Lưu Tee</span>
                                            </p>
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>

                                            <p>Mặc dù vận chuyển lâu do lỗi, nhưng shop vẫn hỗ trợ mình rất nhiệt tình
                                            </p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="divider-line"></div>
                                        </div>
                                    </div>
                                    <div class="customer-reviews">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="reviews-text"> <span class="text-default">William
                                                    Cassidy</span>
                                            </p>
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>

                                            <p>Sản phẩm rất tốt vì là lần đầu tôi mua trên mạng đt nên thấy khá là lo
                                                lắng nhưng khi nhận đc hàng thì tôi lại thấy tốt hơn mong đợi của mình
                                                chúc Shop làm ăn mua may bán đắt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

               
                <!-- /.reviews-form -->

            </div>


        </div>
        
    </div>
    <?php 
 