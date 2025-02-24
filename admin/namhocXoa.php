<?php
    include('./namhoc.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new namhoc();
        $data->id = $_GET["id"];
        $data  =  $data->xoanamhoc($conn,$baseUrl);
    }
?>
