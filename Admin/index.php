<?php
include('../DB/DB_business.php');
$db= new DB_driver();
include('admin/header.php');
if(isset($_GET['page'])){
    $page=$_GET['page'];
    switch($page){
        case 'addProduct':
            include('admin/addProduct.php');
            break;
        case 'updateProduct':
            include('admin/updateProduct.php');
            break;
        case 'product':
            include('admin/product.php');
            break;
        
        case 'donhang':
            include('admin/bill.php');
            break;
        
        
    }

}
else
{
    include('admin/home.php');
}

include('admin/footer.php');
?>