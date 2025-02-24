<?php   
    include('./ndung.php');
    $data = ndung::layDanhSachND($conn);

    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=ndungth"; ?>">Thêm loại</a>
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
                    <td><?php echo $item->nd_name;?></td>
                    <td>
                    </td>
                    <td><a href='<?php echo "$baseUrl?p=ndungsua&&id=$item->id" ?>'>Sua</a> | <a href='<?php echo "$baseUrl?p=ndungxoa&&id=$item->id" ?>'>Xoa</a></td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
