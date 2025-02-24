<?php
    include('./namhoc.php');
    if(isset($_POST["role"])){
        $data = new namhoc();
        $data->id = $_POST["id"];
        $data->namhoc_name = $_POST["namhoc_name"];
       
        $data->suaNdung($conn,$baseUrl);
    }else{
        $id = isset($_GET["id"]);
        $data = new namhoc();
        $data  =  $data->laynamhoc($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="id" name="id" value ='<?php echo $data->id;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Tên Nội Dung:</label>
        <input type="text" class="form-control" id="namhoc_name" name="namhoc_name" value ='<?php echo $data->namhoc_name;?>'>
    </div>
   
    <div class="form-group">
        <input type="submit" class="form-control" value="Sua the loai"/>
    </div>
</form>