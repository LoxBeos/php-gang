<?php
    include('./ndung.php');
    if(isset($_POST["role"])){
        $data = new ndung();
        $data->id = $_POST["id"];
        $data->nd_name = $_POST["nd_name"];
       
        $data->suaNdung($conn,$baseUrl);
    }else{
        $id = isset($_GET["id"]);
        $data = new ndung();
        $data  =  $data->layNdung($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="id" name="id" value ='<?php echo $data->id;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Tên thể loại:</label>
        <input type="text" class="form-control" id="nd_name" name="nd_name" value ='<?php echo $data->nd_name;?>'>
    </div>
   
    <div class="form-group">
        <input type="submit" class="form-control" value="Sua the loai"/>
    </div>
</form>