<?php

include "./model/UserModel.php";

class UserController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        //load view dang ky
        include "./view/register.php";
    }

    public function registerStore()
    {
        if (isset($_POST['register'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $thoiGian = date("Y-m-d");
            // luu vao db
            $this->userModel->register($email, $password, $thoiGian);

            header("location:?action=login");
        }
    }

    public function login()
    {
        // load view
        include "./view/login.php";
    }

    public function checkLogin()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // lay thong tin nguoi dung tu db
            $user = $this->userModel->login($email);

            // sau khi co thong tin nguoi dung can check xem co dung password khong
            if ($user) {
                if ($user['password'] == $password) {
                    // luu thong tin vao session
                    $_SESSION['email'] = $email;
                    if ($user['role'] == 3) {
                        $_SESSION['admin'] = $email;
                        $_SESSION['role'] = 3;
                    }
                    // chuyen huong ve trang chu
                    header("location:?action=home");
                } else {
                    echo "Mật khẩu không đúng.";
                }
            } else {
                echo "Người dùng không tồn tại.";
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['email'])) {
            session_destroy();
            header("location:?action=login");
        }
    }

    public function changepassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['email'];
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $re_password = $_POST['re_password'];

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $user = $this->userModel->login($email);
            if ($user) {
                // Kiểm tra mật khẩu cũ và mật khẩu mới
                if ($old_password == $user['password'] && $new_password === $re_password) {
                    // Cập nhật mật khẩu vào cơ sở dữ liệu
                    $result = $this->userModel->changePassword($email, $new_password);
                    if ($result) {
                        echo "Mật khẩu đã được đổi thành công!";
                    } else {
                        echo "Có lỗi xảy ra khi cập nhật mật khẩu.";
                    }
                } else {
                    echo "Mật khẩu cũ không đúng hoặc mật khẩu mới không khớp.";
                }
            } else {
                echo "Người dùng không tồn tại.";
            }
        }
    }

    public function profile()
    {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $user = $this->userModel->getUserByEmail($email);
            // Gửi thông tin người dùng đến view
            include './view/profile.php';
        } else {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header('Location: /login');
        }
    }

    public function capnhatinfo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['email'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $user = $this->userModel->getUserByEmail($email);
            if ($user) {
                // Cập nhật thông tin người dùng vào cơ sở dữ liệu
                $result = $this->userModel->updateInfo($email, $gioitinh, $ngaysinh);

                if ($result) {
                    echo "Thông tin đã được cập nhật thành công!";
                } else {
                    echo "Có lỗi xảy ra khi cập nhật thông tin.";
                }
            } else {
                echo "Người dùng không tồn tại.";
            }
        }
    }
    public function capnhatdiachi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_SESSION['email'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $user = $this->userModel->getUserByEmail($email);
            if ($user) {
                // Cập nhật thông tin người dùng vào cơ sở dữ liệu
                $result = $this->userModel->updateAddress($email, $phone, $address, $name);

                if ($result) {
                    echo "Thông tin đã được cập nhật thành công!";
                } else {
                    echo "Có lỗi xảy ra khi cập nhật thông tin.";
                }
            } else {
                echo "Người dùng không tồn tại.";
            }
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }
    public function admin()
    {
        if (isset($_SESSION['admin'])) {
            include "./admin/adminhome.php";
        } else {
            header("location:?action=login");
        }
    }
    public function showAllUser()
    {
        if (isset($_SESSION['admin'])) {
            $users = $this->userModel->getAllUser();
            include "./admin/view/thanh_vien.php";
        } else {
            header("location:?action=login");
        }
    }
    public function loadViewSuaThanhVien()
    {
        if (isset($_SESSION['admin'])) {
            $id = $_GET['id'];
            $user = $this->userModel->getUserById($id);
            include "./admin/view/update_thanhvien.php";
        } else {
            header("location:?action=login");
        }
    }
    public function editUser()
    {
        if (isset($_POST['edit_capbac'])) {
            $id = $_GET['id'];
            $role = $_POST['role'];
            $result = $this->userModel->updateUser($id, $role);
            if ($result) {
                header("location:?action=thanhvien");
            }
        } else {
            header("location:?action=login");
        }
    }
}
