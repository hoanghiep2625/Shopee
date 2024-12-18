<?php
include "./includes/header.php";
$conn = connectDB();
if ($conn) {
    $categoryId = isset($_GET['category']) ? intval($_GET['category']) : 0;
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM products WHERE name LIKE :searchTerm";
    $params = ['searchTerm' => "%$searchTerm%"];

    if ($categoryId > 0) {
        $sql .= " AND category = :categoryId";
        $params['categoryId'] = $categoryId;
    }

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Lỗi truy vấn: ' . $e->getMessage();
        $products = [];
    }
} else {
    $products = [];
}
?>
<link rel="stylesheet" href="./css/index.css">
<div class="goiy">
    <h4>
        <p>GỢI Ý HÔM NAY</p>
    </h4>
    <hr />
</div>
<article>
    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="sanpham">
                <a href="product.php?id=<?= htmlspecialchars($product["id"]); ?>">
                    <?php if ($product['hot'] == 1) : ?>
                        <p class="like">Yêu thích</p>
                    <?php endif; ?>
                    <?php if ($product["discount_percentage"] > 0) : ?>
                        <p class="discount_percentage"><?= htmlspecialchars($product["discount_percentage"]); ?>%</p>
                    <?php endif; ?>
                    <div class="hinhanh">
                        <a href="?action=product_detail&id=<?= htmlspecialchars($product['id']); ?>">
                            <img src="<?= htmlspecialchars($product['img']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" />
                        </a>
                    </div>

                    <div class="thongtin">
                        <p class="tensanpham"><a href="?action=product_detail&id=<?= htmlspecialchars($product['id']); ?>">
                                <?= htmlspecialchars(limitText($product['name'], 70)); ?>
                            </a>
                        </p>
                        <div class="deal">
                            <p><?= htmlspecialchars($product["deal"]); ?></p>
                            <p><?= htmlspecialchars($product["voucher_code"]); ?></p>
                        </div>
                        <div class="gia">
                            <p>đ<?= tien($product["price"]); ?></p>
                            <?php if ($product['discount_percentage'] > 0) : ?>
                                <p>đ<?= tien($product["price"] / 100 * (100 + $product["discount_percentage"])); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="rate">
                            <div>
                                <?php for ($i = 0; $i < $product["rate"]; $i++) : ?>
                                    <img src="https://img.icons8.com/?size=100&id=60003&format=png&color=FAB005" alt="" />
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < 5 - $product["rate"]; $i++) : ?>
                                    <img src="https://img.icons8.com/?size=100&id=7856&format=png&color=CCCCCC" alt="" />
                                <?php endfor; ?>
                            </div>
                            <div>
                                <p>Đã bán <?= valueUnit($product["sold_quantity"]); ?></p>
                            </div>
                        </div>
                        <div class="diachi">
                            <p><?= htmlspecialchars($product["address"]); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Không tìm thấy sản phẩm nào.</p>
    <?php endif; ?>
</article>
<?php
require_once './includes/footer.php';
?>