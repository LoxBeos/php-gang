<?php   
    include('./hocky.php');
    $data = hky::layDanhSachhky($conn);
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=hockyth"; ?>">Thêm loại</a>
<table class="table">
    <thead>
        <tr>
            <th>Ma Noi Dung</th>
            <th>Ten Danhmuc</th>
            <th>Loai Nam Hoc</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
                <tr>
                    <td scope="row"><?php echo $item->id ;?></td>
                    <td><?php echo $item->hky_name;?></td>
                    <td><?php echo $item->namhoc_id == 1 ? "2022-2023" : "2023-2024"; ?></td>
                    
                    <td>
                    </td>
                    <td><a href='<?php echo "$baseUrl?p=danhmuccS&&id=$item->id" ?>'>Sua</a> | <a href='<?php echo "$baseUrl?p=danhmuccX&&id=$item->id" ?>'>Xoa</a></td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
