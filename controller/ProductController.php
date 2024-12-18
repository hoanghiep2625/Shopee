<?php

// Nhúng file model
include "./model/ProductModel.php";

class ProductController
{
    public $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showAllProduct()
    {
        // Gọi db và lấy kết quả về
        $products = $this->productModel->getAllProdut();
        // Gọi view để trả kết quả cho người dùng
        include "./view/home.php";
    }

    public function showAllProductAdmin()
    {
        // Gọi db và lấy kết quả về
        $products = $this->productModel->getAllProdutAdmin();
        // Gọi view để trả kết quả cho người dùng
        include "./admin/adminhome.php";
    }

    public function showProductDetail($id)
    {
        $product = $this->productModel->getProductById($id);
        include "./view/productDetail.php";
    }

    // Hàm này chỉ có nhiệm vụ load view
    public function loadViewThem()
    {
        // Load các categories
        $categories = $this->productModel->getAllCategory();
        include "admin/view/them.php";
    }

    public function store()
    {
        if (isset($_POST['them'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $address = $_POST['address'];
            $img = $_FILES['anh'];
            $quantity = $_POST['quantity']; // Thay thế $quanty bằng $quantity
            $des_c = $_POST['chitietsanpham'];
            $sold_quantity = $_POST['sold_quantity'];
            $voucher_code = $_POST['voucher_code'];
            $deal = $_POST['deal'];
            $discount_percentage = $_POST['discount_percentage'];
            $rate = $_POST['rate'];
            $hot = isset($_POST['hot']) ? 1 : 0;
            $chitietsanpham = $_POST['chitietsanpham'];
            $reviews = $_POST['reviews'];
            $categorie = $_POST['category'];
            // Upload ảnh vào thư mục public/img và lấy đường dẫn về
            $img_path = $this->uploadFile($img);

            // Lưu vào DB
            $this->productModel->store($name, $price, $img_path, $quantity, $des_c, $address, $sold_quantity, $voucher_code, $deal, $discount_percentage, $rate, $hot, $reviews, $categorie, $chitietsanpham);

            // Chuyển hướng về trang chính
            header('Location: ?action=admin');
            exit;
        }
    }
    public function delete($id)
    {
        $this->productModel->destroy($id);
        header('Location: ?action=admin');
        exit;
    }

    public function loadViewSua($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = $this->productModel->getAllCategory();
        include "./admin/view/update.php";
    }

    public function update($id)
    {
        if (isset($_POST['sua'])) {
            // Lấy dữ liệu từ form
            $name = $_POST['name'];
            $price = $_POST['price'];
            $address = $_POST['address'];
            $sold_quantity = $_POST['sold_quantity'];
            $voucher_code = $_POST['voucher_code'];
            $deal = $_POST['deal'];
            $discount_percentage = $_POST['discount_percentage'];
            $rate = $_POST['rate'];
            $chitietsanpham = $_POST['chitietsanpham'];
            $reviews = $_POST['reviews'];
            $quantity = $_POST['quantity']; // Sử dụng $quantity thay vì $quanty
            $categorie = $_POST['category'];
            // Kiểm tra và xử lý ảnh
            $img = $_FILES['anh'];
            if ($img['size'] == 0) {
                // Không có ảnh mới, giữ ảnh cũ
                $product = $this->productModel->getProductById($id);
                $img_path = $product['img']; // Sử dụng 'img' thay vì 'image'
            } else {
                // Upload ảnh mới và lấy đường dẫn
                $img_path = $this->uploadFile($img);
            }

            // Cập nhật thông tin sản phẩm
            $this->productModel->updateP($id, $name, $price, $address, $sold_quantity, $voucher_code, $deal, $discount_percentage, $rate, $img_path, $reviews, $quantity, $categorie, $chitietsanpham);

            // Chuyển hướng đến trang danh sách sản phẩm
            header('Location: ?action=admin');
            exit; // Đảm bảo không có mã nào khác tiếp tục thực thi
        }
    }

    // Hàm upload ảnh
    private function uploadFile($file)
    {
        $targetDir = 'public/image/';
        $targetFile = $targetDir . basename($file['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra xem file có phải là ảnh không
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file
        if ($file['size'] > 500000) { // Ví dụ: giới hạn kích thước 500KB
            $uploadOk = 0;
        }

        // Kiểm tra loại file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Nếu upload ok, di chuyển file
        if ($uploadOk == 1) {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $targetFile;
            } else {
                $uploadOk = 0;
            }
        }

        // Nếu không upload được, có thể xử lý thêm lỗi
        return null;
    }
    public function showAllCategory()
    {
        $categories = $this->productModel->getAllCategory();
        include "./admin/view/category.php";
    }
    public function loadViewThemCategory()
    {
        include "./admin/view/themCategory.php";
    }
    public function storeCategory()
    {
        if (isset($_POST['themdanhmucsanpham'])) {
            $categoryName = trim($_POST['category_name']);
            if (!empty($categoryName)) {
                $this->productModel->storeCategory($categoryName);
                header('Location: ?action=danhmuc');
                exit;
            } else {
                $message = 'Vui lòng nhập tên danh mục.';
                $_SESSION['message'] = $message;
                header('Location: themCategory.php');
                exit;
            }
        }
    }
    public function deleteCategory()
    {
        $id = $_GET['id'];
        $this->productModel->destroyCategory($id);
        header('Location: ?action=danhmuc');
        exit;
    }
}
