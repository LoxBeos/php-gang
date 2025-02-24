<?php
if(isset($_POST["dmc_name"])){
    include('./danhmuccon.php');
    $data = new danhmuccon();
    $data->dmc_name = $_POST["dmc_name"];
    $data->dmc_theloaicon = $_POST["id_theloai"];
    $data->dmc_diem = $_POST["dmc_diem"];
    $data->themDmc($conn, $baseUrl);
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="dmc_name">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="dmc_name" name="dmc_name">
    </div>
    <div class="form-group">
        <label for="id_theloai">Thể Loại:</label>
        <select name="id_theloai" id="id_theloai" class="form-control">
            <?php
            include('danhmuc.php');
            $dmList = danhmuc::selectDanhMuc($conn);
            foreach ($dmList as $danhmuc) {
                ?>
                <option value="<?php echo $danhmuc->id; ?>"><?php echo $danhmuc->dm_name; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="dmc_diem">Điểm Danh Mục:</label>
        <input type="text" class="form-control" id="dmc_diem" name="dmc_diem">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Thêm danh mục"/>
    </div>
</form>