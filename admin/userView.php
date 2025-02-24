<?php   
    include('./user.php');
    $data = user::layDanhSachUser($conn);

    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=userth"; ?>">Thêm user</a>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>fullname</th>
            <th>dob</th>
            <th>address</th>
            <th>role</th>
            <th>gender</th>
            <th>email</th>
            <th>phone</th>       
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
             
        ?>
                <tr>
                    <td scope="row"><?php echo $item->id ;?></td>
                    <td><?php echo $item->username;?></td>
                    <td><?php echo $item->password;?></td>
                    <td><?php echo $item->fullname;?></td>
                    <td><?php echo $item->dob;?></td>
                    <td><?php echo $item->address;?></td>
                    <td><?php echo $item->role == 1 ? "ADMIN" : ($item->role == 2 ? "MANAGER" : "USER"); ?></td>
                    <td><?php echo $item->gender == 1 ? "Nam" : "Nu"; ?></td>
                    <td><?php echo $item->email;?></td>
                    <td><?php echo $item->phone;?></td>
                    <td><a href='<?php echo "$baseUrl?p=usersua&&id=$item->id" ?>'>Sua</a> | <a href='<?php echo "$baseUrl?p=userxoa&&id=$item->id" ?>'>Xoa</a></td>
                        
                    </td>
                  
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
