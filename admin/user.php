<?php

    class user {
        public $id;
        public $username;
        public $password;   
        public $fullname;
        public $dob;
        public $address;
        public $role;
        public $gender;
        public $email;
        public $phone;

        public static function layDanhSachUser($conn) {
            $DSuser = array();
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $user_obj = new user();
                    $user_obj->id = $row["id"];
                    $user_obj->username = $row["username"];
                    $user_obj->password = $row["password"];
                    $user_obj->fullname = $row["fullname"];
                    $user_obj->dob = $row["dob"];
                    $user_obj->address = $row["address"];
                    $user_obj->role = $row["role"];
                    $user_obj->gender = $row["gender"];
                    $user_obj->email = $row["email"];
                    $user_obj->phone = $row["phone"];
                    $DSuser[] = $user_obj;
                }
            }
            return $DSuser;

        }

        //// 04//2023
        
        public function layuser($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM user WHERE id = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $user = new user();
            $row = mysqli_fetch_assoc($result);
            $user->id = $row["id"];
            $user->username = $row["username"];
            $user->password = $row["password"];
            $user->fullname = $row["fullname"];
            $user->dob = $row["dob"];
            $user->address = $row["address"];
            $user->role = $row["role"];
            $user->gender = $row["gender"];
            $user->email = $row["email"];
            $user->phone = $row["phone"];
            
        
            // Trả về đối tượng loaisp
            
            return $user;
        }

        public function suauser($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi sua thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE user SET username = '$this->username', password = '$this->password' , fullname = '$this->fullname', address = '$this->address', role = '$this->role', gender = '$this->gender', email = '$this->email', phone = '$this->phone' WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sua thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=user&message=" . urlencode($message));
            exit();
        }

        public function xoauser($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi xoa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM user WHERE id = $this->id";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xoa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=user&message=" . urlencode($message));
            exit();
        }


    }

?>