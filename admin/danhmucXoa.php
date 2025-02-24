<?php
    include('./danhmuc.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new danhmuc();
        $data->id = $_GET["id"];
        $data  =  $data->xoaDM($conn,$baseUrl);
    }
?>
