<?php
    include('./danhmuccon.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new danhmuccon();
        $data->id = $_GET["id"];
        $data  =  $data->xoaDmc($conn,$baseUrl);
    }
?>
