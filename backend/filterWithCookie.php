<!--Dẫn link vào role nguoi dung-->
<?php
    require_once("auth.php");
    $checkCookie = Auth::loginWithCookie();
    if($checkCookie != null){
        if($checkCookie['role']==1){
            echo '<a href="admin/index.php">TRUY CẬP TRANG ADMIN</a>';
        }
        echo '<a href="#">'.$checkCookie['fullname'].'</a>
        <a href="/shopperfume2/backend/logoutCookie.php">Đăng Xuất</a>';
    }
    else{
        echo '<a href="auth/login/index.php">Login & Regiser</a>';
    }
?>