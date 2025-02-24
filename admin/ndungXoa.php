<?php
    include('./ndung.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new ndung();
        $data->id = $_GET["id"];
        $data  =  $data->xoaNdung($conn,$baseUrl);
    }
?>
