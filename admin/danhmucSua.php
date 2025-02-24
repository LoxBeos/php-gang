<?php
    include('./danhmuc.php');
    if(isset($_POST["dm_name"])){
        $data = new danhmuc();
        $data->id = $_POST["id"];
        $data->dm_name = $_POST["dm_name"];
       $data->dm_diem + $_POST["dm_diem"];
        $data->suaDM($conn,$baseUrl);
    }else{
        $id = isset($_GET["id"]);
        $data = new danhmuc();
        $data  =  $data->layDM($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="id" name="id" value ='<?php echo $data->id;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="dm_name" name="dm_name" value ='<?php echo $data->dm_name;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Diem:</label>
        <input type="text" class="form-control" id="dm_diem" name="dm_diem" value ='<?php echo $data->dm_diem;?>'>
    </div>
   
    <div class="form-group">
        <input type="submit" class="form-control" value="Sua the loai"/>
    </div>
</form>