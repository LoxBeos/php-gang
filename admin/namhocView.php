<?php   
    include('./namhoc.php');
    $data = namhoc::layDanhSachNH($conn);

    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=namhocth"; ?>">Thêm loại</a>
<table class="table">
    <thead>
        <tr>
            <th>Ma Noi Dung</th>
            <th>Ten noi dung</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
                <tr>
                    <td scope="row"><?php echo $item->id ;?></td>
                    <td><?php echo $item->namhoc_name;?></td>
                    <td>
                    </td>
                    <td><a href='<?php echo "$baseUrl?p=namhocS&&id=$item->id" ?>'>Sua</a> | <a href='<?php echo "$baseUrl?p=namhocX&&id=$item->id" ?>'>Xoa</a></td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
