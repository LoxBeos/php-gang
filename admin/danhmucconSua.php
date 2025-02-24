<?php
    include('./danhmuccon.php');
    if(isset($_POST["dmc_name"])){
        $data = new danhmuccon();
        $data->id = $_POST["id"];
        $data->dmc_name = $_POST["dmc_name"];
       $data->dmc_diem = $_POST["dmc_diem"];
        $data->suaDmc($conn,$baseUrl);
    }else{
        $id = isset($_GET["id"]);
        $data = new danhmuccon();
        $data  =  $data->layDmc($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">Ma noi dung:</label>
        <input type="text" class="form-control" id="id" name="id" value ='<?php echo $data->id;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="dmc_name" name="dmc_name" value ='<?php echo $data->dmc_name;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Diem:</label>
        <input type="text" class="form-control" id="dmc_diem" name="dmc_name" value ='<?php echo $data->dmc_diem;?>'>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Sua the loai"/>
    </div>
</form>