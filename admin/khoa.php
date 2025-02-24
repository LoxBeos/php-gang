<?php
class khoa {
    public $id;
    public $makhoa;
    public $lop_id;
    public $user_id;
    public $khoa_name;

    public static function selectKhoa($conn) {
        $sql = "SELECT * FROM khoa";
        $result = $conn->query($sql);

        $khoaList = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $khoa_obj = new khoa();
                $khoa_obj->id = $row["id"];
                $khoa_obj->makhoa = $row["makhoa"];
                $khoa_obj->lop_id = $row["lop_id"];
                $khoa_obj->user_id = $row["user_id"];
                $khoa_obj->khoa_name = $row["khoa_name"];
                $khoaList[] = $khoa_obj;
            }
        }
        return $khoaList;
    }

    public static function laykhoa($conn, $id) {
        $sql = "SELECT * FROM danhmuc WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $khoa_obj = new danhmuc();
        $row = mysqli_fetch_assoc($result);
        $khoa_obj = new khoa();
        $khoa_obj->id = $row["id"];
        $khoa_obj->makhoa = $row["makhoa"];
        $khoa_obj->lop_id = $row["lop_id"];
        $khoa_obj->user_id = $row["user_id"];
        $khoa_obj->khoa_name = $row["khoa_name"];
        return $khoa_obj;
    }

    public function themkhoa($conn, $baseUrl) {
        $message = "Lỗi khi thêm danh mục";
        $sql = "INSERT INTO danhmuc (makhoa, lop_id, user_id, khoa_name) VALUES ('$this->makhoa', '$this->lop_id', '$this->user_id', '$this->khoa_name')";
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $message = "Thêm danh mục với ID $id thành công";
        }
        header("Location: $baseUrl?p=khoa&message=" . urlencode($message));
        exit();
    }
    
    public function suakhoa($conn,$baseUrl) {
        // Thông báo cần gửi
        $message = "Lỗi khi sua thể loại";
        // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
        $sql = "UPDATE danhmuc SET khoa_name = '$this->khoa_name', lop_id = '$this->lop_id', user_id = '$this->user_id' , khoa_name = '$this->khoa_name' , WHERE id = $this->id";
    
        // thực thi câu truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sql)) {
            $message = "Sua thể loại với thành công";
        }
         // Chuyển hướng trang và truyền thông báo qua URL
        header("Location: $baseUrl?p=khoa&message=" . urlencode($message));
        exit();
    }
    public function xoakhoa($conn, $baseUrl) {
        // Thông báo cần gửi
        $message = "Lỗi khi xoa thể loại";

        // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
        $sql = "DELETE FROM ndung WHERE id = $this->id";
    
        // thực thi câu truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sql)) {
            $message = "Xoa thể loại với thành công";
        }
         // Chuyển hướng trang và truyền thông báo qua URL
        header("Location: $baseUrl?p=khoa&message=" . urlencode($message));
        exit();
    }
}
?>