<?php
session_start();
ob_start();
include('./DB/mailer/Exception.php');
include('./DB/mailer/PHPMailer.php');
include('./DB/mailer/SMTP.php');

include('./DB/function.php');
// sendMail('hautt.22it@vku.udn.vn','Hậu','Hau');

include('./DB/DB_business.php');

$db= new DB_driver();
include('./web/index/header.php');
if(isset($_GET["page"])){
    $page = $_GET["page"];
    switch($page){
        case 'contact':
            include('./web/index/contact.php');
            break;
        case 'favorite':
            include('./web/index/favorate.php');
            break;
        case 'detail':
            include('./web/index/detai.php');
            break;
        case 'addcart':
            include('./web/index/cart/addcart.php');
            break;
        case 'updatecart':
            include('./web/index/cart/updatecart.php');
            break;
        case 'delcart':
            include('./web/index/cart/delcart.php');
            break;
        case 'cart':
            include('./web/index/cart/cart.php');
            break;
        case 'allPro':
            include('./web/index/allpro.php');
            break;
        case 'buy':
            include('./web/1/checkout.php');
            break;
        case 'xulidonhang':
            include('./web/1/xulidonhang.php');
            break;
        case 'hoadon':
            include('./web/1/hoadon.php');
            break;
        // account
        case 'account':
            include('./web/acount/account.php');
            break;
       
        case 'manageBill':
            include('./web/acount/manageBill.php');
            break;
        case 'login':
            include('./web/acount/login.php');
            break;
        case 'register':
            include('./web/acount/register.php');
            break;
        case 'forgotPass':
            include('./web/acount/forgotPass.php');
            break;
        case 'checkOTP':
            include('./web/acount/checkOTP.php');
            break;
        case 'getNewPass':
            include('./web/acount/forgotPass.php');
            break;
        case 'logout':
            include('./web/acount/logout.php');
            break;
        case 'feekback':
            include('./web/index/detail.php');
            break;
    }
}else{
    include('./web/index/sp.php');
}

include('./web/index/footer.php');

?>;