<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_drl";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Ket noi csdl bi loi: " . $conn->connect_error);
    }

?>