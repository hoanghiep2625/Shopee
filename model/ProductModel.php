<?php

require_once "./includes/connect.php";
class ProductModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProdut()
    {
        // viet cau truy van
        $sql = "SELECT * FROM products";
        // chay cau truy van
        $result = $this->conn->query($sql);
        // tra ve ket qua
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllProdutAdmin()
    {
        // viet cau truy van
        $sql = "SELECT * FROM products";
        // chay cau truy van
        $result = $this->conn->query($sql);
        // tra ve ket qua
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }


    public function getAllCategory()
    {
        // viet cau truy van
        $sql = "SELECT * FROM categories";
        // chay cau truy van
        $result = $this->conn->query($sql);
        // tra ve ket qua
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($name, $price, $img_path, $quantity, $chitietsanpham, $address, $sold_quantity, $voucher_code, $deal, $discount_percentage, $rate, $hot, $reviews, $categorie)
    {
        $sql = "INSERT INTO products (name, price, address, sold_quantity, voucher_code, deal, discount_percentage, rate, img, hot, chitietsanpham, reviews, quantity, category) 
                VALUES (:name, :price, :address, :sold_quantity, :voucher_code, :deal, :discount_percentage, :rate, :img, :hot, :chitietsanpham, :reviews, :quantity, :category)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':sold_quantity', $sold_quantity);
        $stmt->bindParam(':voucher_code', $voucher_code);
        $stmt->bindParam(':deal', $deal);
        $stmt->bindParam(':discount_percentage', $discount_percentage);
        $stmt->bindParam(':rate', $rate);
        $stmt->bindParam(':img', $img_path);
        $stmt->bindParam(':hot', $hot);
        $stmt->bindParam(':chitietsanpham', $chitietsanpham);
        $stmt->bindParam(':reviews', $reviews);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':category', $categorie);

        $stmt->execute();
    }



    public function destroy($id)
    {
        $sql = "DELETE FROM products WHERE id='$id'";
        $this->conn->query($sql);
    }

    public function updateP($id, $name, $price, $address, $sold_quantity, $voucher_code, $deal, $discount_percentage, $rate, $img_path, $reviews, $quantity, $category, $chitietsanpham)
    {
        $sql = "UPDATE products SET 
            name = :name, 
            price = :price, 
            address = :address, 
            sold_quantity = :sold_quantity, 
            voucher_code = :voucher_code, 
            deal = :deal, 
            discount_percentage = :discount_percentage, 
            rate = :rate, 
            img = :img, 
            reviews = :reviews, 
            chitietsanpham = :chitietsanpham,
            quantity = :quantity,
            category = :category
        WHERE id = :id";

        // Sử dụng prepared statements để bảo vệ khỏi SQL Injection
        $stmt = $this->conn->prepare($sql);

        // Gán các giá trị cho các placeholder
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':sold_quantity', $sold_quantity);
        $stmt->bindParam(':voucher_code', $voucher_code);
        $stmt->bindParam(':deal', $deal);
        $stmt->bindParam(':discount_percentage', $discount_percentage);
        $stmt->bindParam(':rate', $rate);
        $stmt->bindParam(':img', $img_path); // Đảm bảo tên placeholder khớp với tên ở câu lệnh SQL
        $stmt->bindParam(':reviews', $reviews);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':chitietsanpham', $chitietsanpham);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function storeCategory($categoryName)
    {
        try {
            $sql = "INSERT INTO categories (name) VALUES (:name)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $categoryName, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            throw new Exception('Lỗi khi thêm danh mục: ' . $e->getMessage());
        }
    }
    public function destroyCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id='$id'";
        $this->conn->query($sql);
    }
}
