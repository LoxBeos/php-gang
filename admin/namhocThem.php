<?php
    if(isset($_POST["namhoc_name"])){
        include('./namhoc.php');
        $data = new namhoc();
        
        $data->namhoc_name = $_POST["namhoc_name"];
        
        $data->themnamhoc($conn,$baseUrl);
    }
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="theloai_ten">Tên Noi Dung:</label>
        <input type="text" class="form-control" id="namhoc_name" name="namhoc_name">
    </div>
    
    <div class="form-group">
        <input type="submit" class="form-control" value="Them noi dung"/>
    </div>
</form>