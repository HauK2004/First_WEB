<?php
// Thực hiện kết nối tới cơ sở dữ liệu

$ma_sp = $_GET['ma_sp'];
$sql = "SELECT * FROM sanpham WHERE ma_sp = $ma_sp";
$result = $db->query($sql);
$array = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy giá trị số lượng từ trường input
    $soLuong = $_POST['quantity'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu giohang
    $sqlUpdate = "UPDATE giohang SET sl_sp_gh = $soLuong WHERE ma_sp = $ma_sp";
    $resultUpdate = $db->query($sqlUpdate);
    if (!$resultUpdate) {
        echo "Cập nhật số lượng thành công!";
    } else {
        echo "<script>window.location.href='index.php?page=cart'</script>";
    }
}
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <!-- product-description -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                                <div class=""><img src="picture/<?php echo $array['anh_sp']; ?>" alt=""
                                        style="width:60%; margin-left: 20%;"></div>
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
                                        <span class="text-secondary">&nbsp;(12 đánh giá)</span>
                                    </div>
                                    <p class="product-price" style="font-size: 25px;">25.350.000đ<strike
                                            style="color:rgba(128, 128, 128, 0.658); font-size: 18px;">
                                            27.990.000đ</strike>
                                    </p>
                                    <div class="product-quantity">
                                        <h4>Số lượng</h4>
                                        <form method="POST" action="">
                                            <div class="quantity mb20">
                                                <input class="btn-quantity decrease-quantity"
                                                    onclick="decreaseQuantity()" type="button" value="-">
                                                <input type="number" max="10" min="1" name="quantity" value="1"
                                                    class="quantity-input" id="quantity-input">
                                                <input class="btn-quantity increase-quantity"
                                                    onclick="increaseQuantity()" type="button" value="+">
                                            </div>
                                           
                                          
                                        
                                    </div>
                                    <div>
                                    
                                        <button type="submit" class="btn btn-default">
                                                <i class="fa fa-shopping-cart"></i>&nbsp;Cập nhật vào giỏ hàng
                                            </button>
                                            </form>
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