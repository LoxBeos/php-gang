<?php
    include('./user.php');
    if(isset($_POST["role"])){
        $data = new user();
        $data->id = $_POST["id"];
        $data->username = $_POST["username"];
        $data->password = $_POST["password"];
        $data->fullname = $_POST["fullname"];
        $data->dob = $_POST["dob"];
        $data->address = $_POST["address"];
        $data->role = $_POST["role"];
        $data->gender = $_POST["gender"];
        $data->email = $_POST["email"];
        $data->phone = $_POST["phone"];

       
        $data->suauser($conn,$baseUrl);
    }else{
        $id = isset($_GET["id"]);
        $data = new user();
        $data  =  $data->layuser($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">ID</label>
        <input type="text" class="form-control" id="id" name="id" class="form-control" placeholder="Nhập ID" value ='<?php echo $data->id;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten"> username</label>
        <input type="text" class="form-control" id="username" name="username" class="form-control" placeholder="Nhập Username" value ='<?php echo $data->username;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">password</label>
        <input type="text" class="form-control" id="password" name="password" class="form-control" placeholder="Nhập Password" value ='<?php echo $data->password;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Fullname:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" class="form-control" placeholder="Nhập Fullname" value ='<?php echo $data->fullname;?>'>
    </div>
    <!--<div class="form-group">
        <label for="theloai_ten">dob</label>
        <input type="text" class="form-control" id="role" name="role" value ='<?php echo $data->role;?>'>
    </div>-->
    <div class="form-group">
        <label for="theloai_ten">Địa chỉ:</label>
        <input type="text" class="form-control" id="address" name="address" class="form-control" placeholder="Nhập Address" value ='<?php echo $data->address;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Chức vụ</label>
        <input type="text" class="form-control" id="role" name="role" class="form-control" placeholder="Nhập Chức vụ" value ='<?php echo $data->role;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Giới tính</label>
        <input type="text" class="form-control" id="gender" name="gender" class="form-control" placeholder="Nhập giới tính (0/1)" value ='<?php echo $data->gender;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">email:</label>
        <input type="text" class="form-control" id="email" name="email" class="form-control" placeholder="Nhập Email" value ='<?php echo $data->email;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Số điện thoại:</label>
        <input type="text" class="form-control" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" value ='<?php echo $data->phone;?>'>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Update"/>
    </div>
</form>