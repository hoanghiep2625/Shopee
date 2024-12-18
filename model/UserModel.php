<?php
require_once "./includes/connect.php";
class UserModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function register($email, $password, $thoiGian)
    {
        $sql = "INSERT INTO users (email, password, thoi_gian_tao) VALUES (:email, :password, :thoiGian)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':thoiGian', $thoiGian);
        $stmt->execute();
    }

    public function login($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function changePassword($email, $new_password)
    {
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(':password', $new_password);
            $stmt->bindParam(':email', $email);
            $success = $stmt->execute();
            return $success;
        } else {
            return false;
        }
    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateInfo($email, $gioitinh, $ngaysinh)
    {
        // Kiểm tra và xử lý dữ liệu đầu vào
        if ($gioitinh === '' || !is_numeric($gioitinh)) {
            echo "Giới tính không hợp lệ.";
            return false;
        }

        // Câu lệnh SQL với các tham số
        $sql = "UPDATE users SET gioi_tinh = :gioitinh, ngay_sinh = :ngaysinh WHERE email = :email";

        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            // Ràng buộc các tham số
            $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_INT);
            $stmt->bindParam(':ngaysinh', $ngaysinh);
            $stmt->bindParam(':email', $email);

            // Thực thi câu lệnh
            $success = $stmt->execute();

            // Kiểm tra lỗi nếu có
            if (!$success) {
                print_r($stmt->errorInfo());
            }

            return $success;
        } else {
            return false;
        }
    }
    public function updateAddress($email, $phone, $address, $name)
    {
        $sql = "UPDATE users SET email = :email, phone = :phone, address = :address, name =:name WHERE email = :email";
        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            // Ràng buộc các tham số
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':name', $name);
            // Thực thi câu lệnh
            $success = $stmt->execute();

            // Kiểm tra lỗi nếu có
            if (!$success) {
                print_r($stmt->errorInfo());
            }

            return $success;
        } else {
            return false;
        }
    }
    public function getAllUser()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUser($id, $role)
    {
        try {

            $sql = "UPDATE users SET role = :role WHERE id = :id";

            // Prepare statement
            $stmt = $this->conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute statement
            $stmt->execute();

            echo "Cập nhật thành công.";
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
