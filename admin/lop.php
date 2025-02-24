<?php

    class lop {
        public $id;
        public $lop_name;  
        public $khoa_id;
        public $nam_id;

        public static function layDanhSachLop($conn) {

            $lopList = array();
            $sql = "SELECT * FROM lop";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $lop_obj = new lop();
                    $lop_obj->id = $row["id"];
                    $lop_obj->lop_name = $row["lop_name"];
                    $lop_obj->khoa_id = $row["khoa_id"];
                    $lop_obj->nam_id = $row["nam_id"];
                    $lop[] = $lop_obj;
                }
            }
            return $lopList;

        }
        public function themlop($conn,$baseUrl) {
            
            // Thông báo cần gửi
            $message = "Lỗi khi thêm thể loại";
            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO lop (lop_name) VALUES ('$this->lop_name')";
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Thêm thể loại với $id thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=lop&message=" . urlencode($message));
            exit();
        }

        //// 04//2023
        public function laylop($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM lop WHERE id = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $lop = new lop();
            $row = mysqli_fetch_assoc($result);
            $lop->id = $row['id'];
            $lop->lop_name = $row['lop_name'];
            return $lop;
        }

        public function sualop($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi sua thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE lop SET nd_name = '$this->lop_name' WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sua thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=lop&message=" . urlencode($message));
            exit();
        }

        public function xoalop($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi xoa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM lop WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xoa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=lop&message=" . urlencode($message));
            exit();
        }


    
}

?>