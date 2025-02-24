<?php
include('admin/ndung.php');

$DSndung = ndung::layDanhSachNDDM($conn);

if (isset($_GET["message"])) {
    $message = $_GET["message"];
}
?>

<table class="table">
    <thead>
        <tr>
            <th>Mã Nội Dung</th>
            <th>Tên Danh Mục</th>
            <th>Nội Dung</th>
            <th>Điểm</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($DSndung) {
            foreach ($DSndung as $ndung) {
                ?>
                <tr>
                    <td scope="row"><?php echo $ndung->id; ?></td>
                    <td><?php echo $ndung->nd_name; ?></td>
                    <td><input type="text" name="ndung_<?php echo $ndung->id; ?>" value=""></td>
                    <td></td>
                </tr>
                <?php
                if ($ndung->nd_con) {
                    foreach ($ndung->nd_con as $danhmuc) {
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $danhmuc->dm_name; ?></td>
                            <td><input type="text" name="danhmuc_<?php echo $danhmuc->id; ?>" value=""></td>
                            <td><?php echo $danhmuc->dm_diem; ?></td>
                        </tr>
                        <?php
                        if ($danhmuc->dm_dmc) {
                            foreach ($danhmuc->dm_dmc as $dmc) {
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><input type="text" name="danhmuccon_<?php echo $dmc->id; ?>" value=""></td>
                                    <td><?php echo $dmc->dmc_diem; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                }
            }
        } else {
            // Xử lý khi không có dữ liệu
        }
        ?>
    </tbody>
    
</table>
<button type="submit">Lưu điểm</button>