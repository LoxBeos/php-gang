<?php

    $baseUrl = $_SERVER['PHP_SELF'];
    $pages = array(
        'ndung' => array('Loai noi Dung', 'ndungView.php'),
        'ndungth' => array('Thêm Noi Dung', 'ndungThem.php'),
        'ndungsua' => array('Sua noi Dung', 'ndungSua.php'),
        'ndungxoa' => array('Xoa noi dung', 'ndungXoa.php'),
        'user' => array('User', 'userView.php'),
        'userth' => array('Thêm Noi Dung', 'userThem.php'),
        'usersua' => array('Sua noi Dung', 'userSua.php'),
        'userxoa' => array('Xoa noi dung', 'userXoa.php'),
        'home' => array('Trang chu', 'home.php'),
        'danhmucc' => array('Danh Muc Con', 'danhmucconView.php'),
        'dmuccth' => array('Them noi dung', 'danhmucconThem.php'),
        'danhmuccS' => array('Danh Muc Con', 'danhmucconSua.php'),
        'danhmuccX' => array('Danh Muc Con', 'danhmucconXoa.php'),
        'hocky' => array('Hoc Ky', 'hockyView.php'),
        'hockyth' => array('Them Hoc Ky', 'hockyThem.php'),
        'namhoc' => array('Nam Hoc', 'namhocView.php'),
        'namhocth' => array('Noi Dung Nam Hoc', 'namhocThem.php'),
        'namhocS' => array('Noi Dung Nam Hoc', 'namhocSua.php'),
        'namhocX' => array('Noi Dung Nam Hoc', 'namhocXoa.php'),
        'danhmuc' => array('Danh Muc Diem', 'danhmucView.php'),
        'dmucS' => array('Danh Muc Diem', 'danhmucSua.php'),
        'dmucX' => array('Danh Muc Diem', 'danhmucXoa.php'),
        'dmucth' => array('Thêm Noi Dung', 'danhmucThem.php')
    );

    include('../connectdb.php'); 

    include('./theme.php')

?>