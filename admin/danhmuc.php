<?php
include('danhmuccon.php');
class danhmuc {
    public $id;
    public $dm_name;
    public $dm_theloai;
    public $dm_diem;
    public $dm_dmc;
    public static function selectDanhMuc($conn) {
        $sql = "SELECT * FROM danhmuc";
        $result = $conn->query($sql);

        $dmList = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dm_obj = new danhmuc();
                $dm_obj->id = $row["id"];
                $dm_obj->dm_name = $row["dm_name"];
                $dm_obj->dm_theloai = $row["dm_theloai"];
                $dm_obj->dm_diem = $row["dm_diem"];
                $dmList[] = $dm_obj;
            }
        }
        return $dmList;
    }
    public static function layDanhSachDMDMC($conn) {
        $sql = "SELECT * FROM danhmuc";
        $result = $conn->query($sql);
    
 
    
        if ($result->num_rows > 0) {
            // Lặp qua các dòng kết quả
            while($row = $result->fetch_assoc()) {
                // Tạo đối tượng ndung
                $dm_obj = new danhmuc();
                $dm_obj->id = $row["id"];
                $dm_obj->dm_name = $row["dm_name"];
                $dm_obj->dm_theloai = $row["dm_theloai"];
                $dm_obj->dm_diem = $row["dm_diem"];
                // Truyền giá trị cho biến $id
                $id = $dm_obj->id;
    
                // Gọi hàm selectDanhMucND với tham số $id
                $dm_obj->dm_dmc = danhmuccon::selectDanhMucConID($conn, $dmc_theloai);
    
                // Đưa đối tượng vào mảng
          
            }
        }
    
        return $DSndung;
    }
    public static function selectDanhMucND($conn, $dm_theloai) {
        $sql = "SELECT * FROM danhmuc WHERE dm_theloai = $dm_theloai";
        $result = $conn->query($sql);
    
        $dmList = array();
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dm_obj = new danhmuc();
                $dm_obj->id = $row["id"];
                $dm_obj->dm_name = $row["dm_name"];
                $dm_obj->dm_theloai = $row["dm_theloai"];
                $dm_obj->dm_diem = $row["dm_diem"];
                
                $dmList[] = $dm_obj;
            }
        }
    
        return $dmList;
    }
    public static function layDM($conn, $id) {
        $sql = "SELECT * FROM danhmuc WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $dm_obj = new danhmuc();
        $row = mysqli_fetch_assoc($result);
        $dm_obj->id = $row["id"];
        $dm_obj->dm_name = $row["dm_name"];
        $dm_obj->dm_theloai = $row["dm_theloai"];
        $dm_obj->dm_diem = $row["dm_diem"];
        return $dm_obj;
    }

    public function themDM($conn, $baseUrl) {
        $message = "Lỗi khi thêm danh mục";
        $sql = "INSERT INTO danhmuc (dm_name, dm_theloai, dm_diem) VALUES ('$this->dm_name', '$this->dm_theloai', '$this->dm_diem')";
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $message = "Thêm danh mục với ID $id thành công";
        }
        header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
        exit();
    }
    
    public function suaDM($conn,$baseUrl) {
        // Thông báo cần gửi
        $message = "Lỗi khi sua thể loại";
        // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
        $sql = "UPDATE danhmuc SET dm_name = '$this->dm_name' WHERE id = $this->id";
    
        // thực thi câu truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sql)) {
            $message = "Sua thể loại với thành công";
        }
         // Chuyển hướng trang và truyền thông báo qua URL
        header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
        exit();
    }
    public function xoaDM($conn, $baseUrl) {
        // Thông báo cần gửi
        $message = "Lỗi khi xoa thể loại";

        // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
        $sql = "DELETE FROM danhmuc WHERE id = $this->id";
    
        // thực thi câu truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sql)) {
            $message = "Xoa thể loại với thành công";
        }
         // Chuyển hướng trang và truyền thông báo qua URL
        header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
        exit();
    }
}
?>