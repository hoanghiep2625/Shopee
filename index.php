<?php

session_start();
// nhung file controller
include "./controller/ProductController.php";
include "./controller/UserController.php";
include "./includes/help.php";

// tao bien dieu huong
$action = isset($_GET['action']) ? $_GET['action'] : "home";

// tao doi tuong controller
$productController = new ProductController();
$userController = new UserController();

// tao mảng ánh xạ
$routes = [
    "home" => [$productController, 'showAllProduct'],
    "product_detail" => function () use ($productController) {
        $id = $_GET['id'];
        $productController->showProductDetail($id);
    },
    "register" => [$userController, 'register'],
    "register-store" => [$userController, 'registerStore'],
    "profile" => [$userController, 'profile'],
    "login" => [$userController, 'login'],
    "check-login" => [$userController, 'checkLogin'],
    "logout" => [$userController, 'logout'],
    "them" => [$productController, 'loadViewThem'],
    "store" => [$productController, 'store'],
    "xoa" => function () use ($productController) {
        $id = $_GET['id'];
        $productController->delete($id);
    },
    "sua" => function () use ($productController) {
        $id = $_GET['id'];
        $productController->loadViewSua($id);
    },
    "update" => function () use ($productController) {
        $id = $_GET['id'];

        $productController->update($id);
    },
    "changepassword" => [$userController, 'changepassword'],
    "capnhatinfo" => [$userController, 'capnhatinfo'],
    "capnhatdiachi" => [$userController, 'capnhatdiachi'],
    "admin" => [$productController, 'showAllProductAdmin'],
    "thanhvien" => [$userController, 'showAllUser'],
    "sua_thanhvien" => [$userController, 'loadViewSuaThanhVien'],
    "edit_user" => [$userController, 'editUser'],
    "danhmuc" => [$productController, 'showAllCategory'],
    "themdanhmuc" => [$productController, 'loadViewThemCategory'],
    "themdanhmucsanpham" => [$productController, 'storeCategory'],
    "xoaCategory" => [$productController, 'deleteCategory'],
];

// kiểm tra và gọi phương thức tương ứng
if (array_key_exists($action, $routes)) {
    $callback = $routes[$action];
    if (is_callable($callback)) {
        $callback();
    } else {
        call_user_func($callback);
    }
} else {
    // xử lý trường hợp hành động không hợp lệ
    echo "404 Not Found";
}
