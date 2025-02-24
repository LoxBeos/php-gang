<?php   
    include('./danhmuc.php');
    $data = danhmuc::selectDanhMuc($conn);
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=dmucth"; ?>">Thêm loại</a>
<table class="table">
    <thead>
        <tr>
            <th>Ma Noi Dung</th>
            <th>Ten Danhmuc</th>
            <th>NoiDung</th>
            <th>Diem</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
                <tr>
                    <td scope="row"><?php echo $item->id ;?></td>
                    <td><?php echo $item->dm_name;?></td>
                    <td><?php echo $item->dm_theloai;?></td>
                    <td><?php echo $item->dm_diem;?></td>
                    <td>
                    </td>
                    <td><a href='<?php echo "$baseUrl?p=dmucS&&id=$item->id" ?>'>Sua</a> | <a href='<?php echo "$baseUrl?p=dmucX&&id=$item->id" ?>'>Xoa</a></td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
