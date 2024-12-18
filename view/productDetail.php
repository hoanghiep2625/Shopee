<?php
include "./includes/header.php";
?>
<link rel="stylesheet" href="./css/product.css">
<article>
    <div class="anh">
        <div class="anh1">
            <img src="<?= htmlspecialchars($product['img']); ?>" alt="">
        </div>
        <div class="anh2">
            <p class="p1">Chia sẻ:
                <i><img src="https://img.icons8.com/?size=100&id=uLWV5A9vXIPu&format=png&color=000000" alt=""></i>
                <i><img src="https://img.icons8.com/?size=100&id=YFbzdUk7Q3F8&format=png&color=000000" alt=""></i>
                <i><img src="https://img.icons8.com/?size=100&id=32323&format=png&color=000000" alt=""></i>
            </p>
            <p class="p2"><i><img src="https://img.icons8.com/?size=100&id=87&format=png&color=FA5252" alt=""></i>Đã thích (27)</p>
        </div>
    </div>
    <div>
        <p class="tensanpham">
            <choice>Choice</choice><?= htmlspecialchars($product['name']); ?>
        </p>
        <div class="vote">
            <p class="rate"><?= htmlspecialchars($product['rate']); ?>
                <?php for ($i = 0; $i < $product["rate"]; $i++) {
                    echo '<img src="https://img.icons8.com/?size=100&id=60003&format=png&color=FAB005" alt="" />';
                }
                for ($i = 0; $i < 5 - $product["rate"]; $i++) {
                    echo '<img src="https://img.icons8.com/?size=100&id=7856&format=png&color=CCCCCC" alt="" />';
                } ?>
            </p>
            <p><?= tien($product['reviews']); ?> Đánh giá</p>
            <p>Đã bán <?= valueUnit($product['sold_quantity']); ?></p>
        </div>
        <div class="gia">
            <div class="gia1">
                <p><?= $product['discount_percentage'] > 0 ? tien($product["price"] / 100 * (100 + $product["discount_percentage"])) . 'đ' : tien($product["price"]); ?>đ</p>
                <p><?= tien($product['price']); ?>đ</p>
                <p>Giảm giá: <?= htmlspecialchars($product['discount_percentage']); ?>%</p>
            </div>
            <div class="gia2">
                <div>
                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/e8b4e9be6b3aa3eb04dd.svg" alt="">
                </div>
                <div>
                    <p>Choice Shopee</p>
                    <p>Đổi miễn phí 15 ngày - Hàng chính hãng 100% - Miễn phí vận chuyển</p>
                </div>
            </div>
        </div>
        <div class="vanchuyen">
            <div>
                <p>Vận chuyển: </p>
            </div>
            <div>
                <p><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/3e0adc366a3964f4fb59.svg" alt=""> Xử lý đơn hàng bởi Shopee</p>
                <p><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/d9e992985b18d96aab90.png" alt=""> Miễn phí vận chuyển</p>
                <p><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/7b101a24cfe44d8eb45f.svg" alt=""> Thời gian giao hàng từ 2-3 ngày</p>
            </div>
        </div>
        <div class="soluong">
            <p>Số lượng</p>
            <button>+</button>
            <input type="number" value="1">
            <button>-</button>
            <p class="quantity"><?= htmlspecialchars($product['quantity']); ?> sản phẩm có sẵn</p>
        </div>
        <div class="muangay">
            <div>
                <p>Thêm vào giỏ hàng</p>
            </div>
            <div>
                <p>Mua ngay</p>
            </div>
        </div>
    </div>
</article>
<aside>
    <div class="chitiet1">
        <p>Chi tiết sản phẩm</p>
    </div>
    <div class="chitiet2">
        <p><?= $product['chitietsanpham']; ?></p>
    </div>
</aside>
<?php
include "./includes/footer.php";
?>