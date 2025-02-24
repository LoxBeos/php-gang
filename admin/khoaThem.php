<?php
if(isset($_POST["makhoa"])){
    include('./khoa.php');
    $data = new khoa();
    $data->makhoa = $_POST["makhoa"];
    $data->lop_id = $_POST["lop_id"];
    $data->user_id = $_POST["user_id"];
    $data->khoa_name = $_POST["khoa_name"];
    $data->themDM($conn, $baseUrl);
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="dm_name">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="dm_name" name="dm_name">
    </div>
    <div class="form-group">
        <label for="lop_id">Lop:</label>
        <select name="lop_id" id="lop_id" class="form-control">
            <?php
            include('lop.php');
            $lopList = lop::layDanhSachLop($conn);
            foreach ($lopList as $lop) {
                ?>
                <option value="<?php echo $lop->id; ?>"><?php echo $lop->lop_name; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="user_id">Ma User:</label>
        <select name="user_id" id="user_id" class="form-control">
            <?php
            include('user.php');
            $DSuser = user::layDanhSachUser($conn);
            foreach ($DSuser as $user) {
                ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="dm_diem">Khoa:</label>
        <input type="text" class="form-control" id="khoa_name" name="khoa_name">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Thêm danh mục"/>
    </div>
</form>