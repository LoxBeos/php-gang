<?php
if(isset($_POST["dm_name"])){
    include('./danhmuc.php');
    $data = new danhmuc();
    $data->dm_name = $_POST["dm_name"];
    $data->dm_theloai = $_POST["id_theloai"];
    $data->dm_diem = $_POST["dm_diem"];
    $data->themDM($conn, $baseUrl);
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="dm_name">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="dm_name" name="dm_name">
    </div>
    <div class="form-group">
        <label for="id_theloai">Thể Loại:</label>
        <select name="id_theloai" id="id_theloai" class="form-control">
            <?php
            include('ndung.php');
            $DSndung = ndung::layDanhSachND($conn);
            foreach ($DSndung as $ndung) {
                ?>
                <option value="<?php echo $ndung->id; ?>"><?php echo $ndung->nd_name; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="dm_diem">Điểm Danh Mục:</label>
        <input type="text" class="form-control" id="dm_diem" name="dm_diem">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Thêm danh mục"/>
    </div>
</form>