<?php
$conn = connectDB();
$sql = "SELECT id, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Lưu trữ kết quả vào một mảng
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/header.css" />
    <title>Shopee Việt Nam</title>
</head>

<body>
    <header>
        <div class="mot">
            <ul>
                <li><a href="#">Kênh người bán</a></li>
                <li><a href="#">Trở thành Người bán Shopee</a></li>
                <li><a href="#">Tải ứng dụng</a></li>
                <li>
                    <a href="#">Kết nối
                        <img src="https://img.icons8.com/?size=100&id=118467&format=png&color=FFFFFF" alt="" />
                        <img src="https://img.icons8.com/?size=100&id=32309&format=png&color=FFFFFF" alt="" />
                    </a>
                </li>
            </ul>
            <ul>
                <li><a href="#"><img src="https://img.icons8.com/?size=100&id=11642&format=png&color=FFFFFF" alt=""> Thông báo</a></li>
                <li><a href="#"><img src="https://img.icons8.com/?size=100&id=14311&format=png&color=FFFFFF" alt=""> Hỗ trợ</a></li>
                <?php if (isset($_SESSION['email'])) {
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == $_SESSION['email']) { ?>
                        <li><a href="?action=admin">Quản trị</a></li>
                    <?php } ?>
                    <li><a href="?action=profile"><?= $_SESSION["email"] ?></a></li>
                    <li><a href="?action=logout">Đăng xuất</a></li>
                <?php } else { ?>
                    <li><a href="?action=login">Đăng nhập</a></li>
                    <li><a href="?action=register">Đăng ký</a></li>
                <?php }
                ?>


            </ul>
        </div>
        <div class="hai">
            <div>
                <a href="?action=home"><img src="./public/image/logo-full-white.png" alt="" /></a>
            </div>
            <div class="search">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Shopee bao ship 0Đ - Đăng ký ngay!" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    <button type="submit">
                        <img src="https://img.icons8.com/?size=100&id=7695&format=png&color=FFFFFF" alt="Search Icon" />
                    </button>
                </form>
            </div>

            <div class="cart">
                <img src="https://img.icons8.com/?size=100&id=CE7rP-35_XQR&format=png&color=FFFFFF" alt="" />
            </div>
        </div>
        <div class="ba">
            <ul>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="index.php?category=<?= htmlspecialchars($category['id']); ?>">
                            <?= htmlspecialchars($category['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>



    </header>