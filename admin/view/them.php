<?php include('./admin/includes/header.php'); ?>
<?php include('./admin/includes/nav.php'); ?>

<link rel="stylesheet" href="https://cdn.ckeditor.com/4.20.2/contents.css">
<style>
    body {
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="file"] {
        padding: 5px;
    }

    input[type="checkbox"] {
        margin-right: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .ck-editor__editable {
        min-height: 200px;
    }

    /* Đảm bảo CKEditor không bị ảnh hưởng bởi các thuộc tính CSS khác */
    .ck.ck-editor__editable {
        font-size: 16px;
        font-family: Arial, sans-serif;
    }
</style>

<form action="?action=store" method="POST" enctype="multipart/form-data">
    <div>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="price">Giá:</label>
        <input type="text" id="price" name="price" required>
    </div>
    <div>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address">
    </div>
    <div>
        <label for="sold_quantity">Số lượng đã bán:</label>
        <input type="number" id="sold_quantity" name="sold_quantity">
    </div>
    <div>
        <label for="voucher_code">Mã voucher:</label>
        <input type="text" id="voucher_code" name="voucher_code" placeholder="vd:Flash sale 00:00 th05">
    </div>
    <div>
        <label for="deal">Ưu đãi:</label>
        <input type="text" id="deal" name="deal" placeholder="vd:Giảm 10k">
    </div>
    <div>
        <label for="discount_percentage">Phần trăm giảm giá (%):</label>
        <input type="number" id="discount_percentage" name="discount_percentage" placeholder="vd:1-100">
    </div>
    <div>
        <label for="rate">Số lượt đánh giá:</label>
        <input type="number" id="rate" name="rate">
    </div>
    <div>
        <label for="img">Ảnh:</label>
        <input type="file" id="img" name="anh">
    </div>
    <div>
        <label>Nổi bật:</label>
        <input type="radio" id="hot_yes" name="hot" value="1">
        <label for="hot_yes">Có</label>
        <input type="radio" id="hot_no" name="hot" value="0">
        <label for="hot_no">Không</label>
    </div>
    <div>
        <label for="chitietsanpham">Chi tiết sản phẩm:</label>
        <textarea id="chitietsanpham" name="chitietsanpham" rows="10"></textarea>
    </div>
    <div>
        <label for="reviews">Số lượt đánh giá:</label>
        <input type="number" id="reviews" name="reviews">
    </div>
    <div>
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
    </div>
    <div>
        <label for="category">Danh mục:</label>
        <select id="category" name="category" required>
            <option value="">Chọn một danh mục</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['name']); ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="them" value="Thêm sản phẩm">
    </div>
</form>

<!-- Initialize CKEditor -->
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('chitietsanpham');
</script>
<?php include('admin/includes/footer.php'); ?>