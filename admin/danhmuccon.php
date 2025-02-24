
<?php


class danhmuccon {
    public $id;
    public $dmc_name;
    public $dmc_theloaicon;
    public $dmc_diem;

    public static function selectDanhMucCon($conn) {
        
        $sql = "SELECT * FROM danhmuccon";
        $result = $conn->query($sql);

        $dmcList = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dmc_obj = new danhmuccon();
                $dmc_obj->id = $row["id"];
                $dmc_obj->dmc_name = $row["dmc_name"];
                $dmc_obj->dmc_theloaicon = $row["dmc_theloai"];
                $dmc_obj->dmc_diem = $row["dmc_diem"];
                $dmcList[] = $dmc_obj;
            }
        }
        return $dmcList;
    }
    public static function selectDanhMucConID($conn,$dm_theloai) {
        
        $sql = "SELECT * FROM danhmuccon where dmc_theloai = $dmc_theloai";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dmc_obj = new danhmuccon();
                $dmc_obj->id = $row["id"];
                $dmc_obj->dmc_name = $row["dmc_name"];
                $dmc_obj->dmc_theloaicon = $row["dmc_theloai"];
                $dmc_obj->dmc_diem = $row["dmc_diem"];
         
            }
        }
        return $dmcList;
    }

    public static function layDmc($conn, $id) {
        $sql = "SELECT * FROM danhmuccon WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $dmc_obj = new danhmuccon();
    
        if ($row = mysqli_fetch_assoc($result)) {
            $dmc_obj->id = $row["id"];
            $dmc_obj->dmc_name = $row["dmc_name"];
            $dmc_obj->dmc_theloaicon = $row["dmc_theloai"];
            $dmc_obj->dmc_diem = $row["dmc_diem"];
        }
    
        return $dmc_obj;
    }

    public function themDmc($conn, $baseUrl) {
        $message = "Lỗi khi thêm danh mục";
        $sql = "INSERT INTO danhmuccon (dmc_name, dmc_theloai, dmc_diem) VALUES ('$this->dmc_name', '$this->dmc_theloaicon', '$this->dmc_diem')";
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $message = "Thêm danh mục với ID $id thành công";
        }
        header("Location: $baseUrl?p=danhmucc&message=" . urlencode($message));
        exit();
    }
    public function suaDmc($conn,$baseUrl) {
        // Thông báo cần gửi
        $message = "Lỗi khi sua thể loại";
        // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
        $sql = "UPDATE danhmuccon SET dmc_name = '$this->dmc_name' WHERE id = $this->id";
    
        // thực thi câu truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sql)) {
            $message = "Sua thể loại với thành công";
        }
         // Chuyển hướng trang và truyền thông báo qua URL
        header("Location: $baseUrl?p=danhmucc&message=" . urlencode($message));
        exit();
    }
}
?>







