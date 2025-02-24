<?php
if(isset($_POST["hky_name"])){
    include('./hocky.php');
    $data = new hky();
    $data->hky_name = $_POST["hky_name"];
    $data->namhoc_id = $_POST["namhoc_id"];
    $data->themhky($conn, $baseUrl);
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="hky_name"> Hoc Ky:</label>
        <input type="text" class="form-control" id="hky_name" name="hky_name">
    </div>
    <div class="form-group">
        <label for="namhoc_id">Nam Hoc:</label>
        <select name="namhoc_id" id="namhoc_id" class="form-control">
            <?php
            include('namhoc.php');
            $namhocList = namhoc::layDanhSachNH($conn);
            foreach ($namhocList as $hocky) {
                ?>
                <option value="<?php echo $hocky->id; ?>"><?php echo $hocky->namhoc_name; ?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="form-control" value="Thêm danh mục"/>
    </div>
</form>