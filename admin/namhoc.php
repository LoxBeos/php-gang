<?php
 
    class namhoc {
        public $id;
        public $namhoc_name;
        
        public static function layDanhSachNH($conn) {

            $namhocList = array();
            $sql = "SELECT * FROM namhoc";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $namhoc_obj = new namhoc();
                    $namhoc_obj->id = $row["id"];
                    $namhoc_obj->namhoc_name = $row["namhoc_name"];
                    $namhocList[] = $namhoc_obj;
                }
            }
            return $namhocList;

        }
        public function themnamhoc($conn,$baseUrl) {
            
            // Thông báo cần gửi
            $message = "Lỗi khi thêm thể loại";
            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO namhoc (namhoc_name) VALUES ('$this->namhoc_name')";
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Thêm thể loại với $id thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=namhoc&message=" . urlencode($message));
            exit();
        }

        //// 04//2023
        public function laynamhoc($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM namhoc WHERE id = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $namhoc = new namhoc();
            $row = mysqli_fetch_assoc($result);
            $namhoc->id = $row['id'];
            $namhoc->namhoc_name = $row['namhoc_name'];
            return $namhoc;
        }

        public function suanamhoc($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi sua thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE namhoc SET namhoc_name = '$this->namhoc_name' WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sua thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=namhoc&message=" . urlencode($message));
            exit();
        }

        public function xoanamhoc($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi xoa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM namhoc WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xoa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=namhoc&message=" . urlencode($message));
            exit();
        }


    
}

?>