<?php
    class hky {
        public $id;
        public $hky_name;
        public $namhoc_id;
        public static function layDanhSachhky($conn) {

            $hkyList = array();
            $sql = "SELECT * FROM hky";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $hky_obj = new hky();
                    $hky_obj->id = $row["id"];
                    $hky_obj->hky_name = $row["hky_name"];
                    $hky_obj->namhoc_id = $row["namhoc_id"];
                    $hkyList[] = $hky_obj;
                }
            }
            return $hkyList;

        }
        public function themhky($conn,$baseUrl) {
            
            // Thông báo cần gửi
            $message = "Lỗi khi thêm thể loại";
            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO hky (hky_name, namhoc_id) VALUES ('$this->hky_name','$this->namhoc_id')";
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Thêm thể loại với $id thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=hocky&message=" . urlencode($message));
            exit();
        }

        //// 04//2023
        public function layhky($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM hky WHERE id = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $hky = new hky();
            $row = mysqli_fetch_assoc($result);
            $hky->id = $row['id'];
            $hky->hky_name = $row['hky_name'];
            $hky_obj->namhoc_id = $row["namhoc_id"];
            return $hky;
        }

        public function suahky($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi sua thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE hky SET hky_name = '$this->hky_name',namhoc_id ='$this->namhoc_id' WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sua thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=hocky&message=" . urlencode($message));
            exit();
        }

        public function xoahky($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi xoa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM hky WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xoa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=hocky&message=" . urlencode($message));
            exit();
        }


    
}

?>