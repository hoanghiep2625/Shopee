<?php

function showData($data)
{

    if (is_array($data)) {
        foreach ($data as $item) {
            echo "<hr>";
            var_dump($item);
        }
    } else {
        var_dump($data);
    }
    die();
}

function uploadFile($file, $folderUpload = './public/image/')
{
    // Thêm time() vào để chống trùng file name
    $pathStorage = $folderUpload . time() . $file['name'];
    // echo $pathStorage;
    // die();

    $from   = $file['tmp_name'];
    $to     = $pathStorage; // Đường dẫn tuong đối

    // function move_uploaded_file(string $from, string $to): bool { }
    // @param string $from — The filename of the uploaded file.
    // @param string $to — The destination of the moved file.
    // @return bool
    // If filename is not a valid upload file, then no action will occur, and move_uploaded_file will return false.
    // @link https://php.net/manual/en/function.move-uploaded-file.php
    if (move_uploaded_file($from, $to)) {
        return $pathStorage; // Trả về đường dẫn để lưu DB
    }

    return null; // Upload fail trả về null
}

function checkAdmin()
{
    // xu li phan quyen
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        // showData($role);
        // kiem tra xem co la admin khong
        if ($role == 3) {
            $action = isset($_GET['action']) ? $_GET['action'] : "home";
            // $action='home';
        } else {
            // echo "<script>alert('Ban khong co quyen truy cap');</script>";
            // header('location:../index.php');
?>
            <script>
                alert('Ban khong co quyen truy cap');
                // setTimeout(() => {
                //     window.location.href='../index.php';
                // }, 3000);
            </script>
<?php
            echo "<script>window.location.href='../index.php';</script>";
            // die();
        }
    } else {
        $action = 'login';
        header('location:?action=login');
    }
}

?>