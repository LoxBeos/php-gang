<?php
    if(isset($_POST["nd_diem"])){
        include('./ndungdiem.php');
        $data = new ndungdiem();
        $data->nd_diem = $_POST["nd_diem"];
        $data->nd_id = $_POST["nd_id"];
        $data->user_id = $_POST["user_id"];
        $data->themNDdiem($conn,$baseUrl);
    }
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="theloai_ten">Tên Noi Dung:</label>
        <input type="text" class="form-control" id="nd_name" name="nd_name">
    </div>
    
    <div class="form-group">
        <input type="submit" class="form-control" value="Them noi dung"/>
    </div>
</form>