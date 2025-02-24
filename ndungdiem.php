<?php

    class ndungdiem {
        public $id;
        public $nd_diem;
        public $nd_id;
        public $user_id;
      
        public static function layDanhSachDiem($conn) {

            
            $sql = "SELECT * FROM ndungdiem";
            $result = $conn->query($sql);
            $DSndungdiem = array();
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $ndungdiem_obj = new ndung();
                    $ndungdiem_obj->id = $row["id"];
                    $ndungdiem_obj->nd_diem = $row["nd_diem"];
               
                    $DSndungdiemlist[] = $ndungdiem_obj;
                }
            }
            return $DSndungdiem;

        }

        

        public function themNDdiem($conn,$baseUrl) {
            
            // Thông báo cần gửi
            $message = "Lỗi khi thêm thể loại";
           

            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO ndungdiem (id, nd_diem, nd_id, user_id) VALUES ('$this->id', '$this->nd_diem', '$this->nd_id', '$this->user_id')";
            
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Thêm thể loại với $id thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
             header("Location: $baseUrl?p=ndungdiem&message=" . urlencode($message));
            exit();
        }

        //// 04//2023
        public function layNDdiem($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM ndung WHERE nd_id = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $ndung = new ndungdiem();
            $row = mysqli_fetch_assoc($result);
            $ndungdiem->id = $row['id'];
            $ndungdiem->nd_diem = $row['nd_diem'];
            $ndungdiem->nd_id = ndung::layNdung($conn,$row["id"]);
            $ndungdiem->user_id = user::layuser($conn,$row["id"]);
            
        
            // Trả về đối tượng loaisp
            return $ndungdiem;
        }

        public function suaNDdiem($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi sua thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE ndung SET nd_diem = '$this->nd_diem'  WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sua thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=ndungdiem&message=" . urlencode($message));
            exit();
        }

        public function xoaNDdiem($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi xoa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM ndung WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xoa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=ndungdiem&message=" . urlencode($message));
            exit();
        }


    }

?>