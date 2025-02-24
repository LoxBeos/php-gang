<?php

    $baseUrl = $_SERVER['PHP_SELF'];
    $pages = array(
        'home' => array('Trang chu', 'home.php'),
        'ndiem' => array('Trang chu', 'ndungdiem.php'),
        'ndungdiemth' => array('Thêm Loai San Pham', 'ndungdiemThem.php'),
        'ndungdiemf' => array('Thêm Loai San Pham', 'ndungviewfake.php'),
        'ndungdiemv' => array('Nhập Điểm Rèn Luyện', 'ndungdiemView.php')
        
    );
    
    include('./connectdb.php'); 
    
    include('./theme.php')

?>