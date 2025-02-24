<?php
    if(isset($_POST["nd_name"])){
        include('./ndung.php');
        $data = new ndung();
        
        $data->nd_name = $_POST["nd_name"];
        
        $data->themNdung($conn,$baseUrl);
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