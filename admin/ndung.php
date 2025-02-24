<?php
include('danhmuc.php');

class ndung {
    public $id;
    public $nd_name;
    public $nd_con;

    public static function layDanhSachND($conn) {
        $DSndung = array();
        $sql = "SELECT * FROM ndung";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ndung_obj = new ndung();
                $ndung_obj->id = $row["id"];
                $ndung_obj->nd_name = $row["nd_name"];
                $DSndung[] = $ndung_obj;
            }
        }
        return $DSndung;
    }

    public static function layDanhSachNDDM($conn) {
        $sql = "SELECT * FROM ndung";
        $result = $conn->query($sql);
    
        $DSndung = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ndung_obj = new ndung();
                $ndung_obj->id = $row["id"];
                $ndung_obj->nd_name = $row["nd_name"];
    
                $id = $ndung_obj->id;
    
                $ndung_obj->nd_con = danhmuc::selectDanhMucND($conn, $id);
    
                $DSndung[] = $ndung_obj;
            }
        }
    
        return $DSndung;
    }

    public function themNDung($conn, $baseUrl) {
        $message = "Lỗi khi thêm thể loại";
        $sql = "INSERT INTO ndung (nd_name) VALUES ('$this->nd_name')";
    
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $message = "Thêm thể loại với $id thành công";
        }
    
        header("Location: $baseUrl?p=ndung&message=" . urlencode($message));
        exit();
    }

    public function layNDung($conn, $id) {
        $sql = "SELECT * FROM ndung WHERE id = $id";
    
        $result = mysqli_query($conn, $sql);
        $ndung = new ndung();
        $row = mysqli_fetch_assoc($result);
        $ndung->id = $row['id'];
        $ndung->nd_name = $row['nd_name'];
        return $ndung;
    }

    public function suaNDung($conn, $baseUrl) {
        $message = "Lỗi khi sửa thể loại";
        $sql = "UPDATE ndung SET nd_name = '$this->nd_name' WHERE id = $this->id";
    
        if (mysqli_query($conn, $sql)) {
            $message = "Sửa thể loại thành công";
        }
    
        header("Location: $baseUrl?p=ndung&message=" . urlencode($message));
        exit();
    }

    public function xoaNdung($conn, $baseUrl) {
        $message = "Lỗi khi xóa thể loại";
        $sql = "DELETE FROM ndung WHERE id = $this->id";
    
        if (mysqli_query($conn, $sql)) {
            $message = "Xóa thể loại thành công";
        }
    
        header("Location: $baseUrl?p=ndung&message=" . urlencode($message));
        exit();
    }
}