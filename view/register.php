<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Shopee</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <h2>Đăng ký</h2>
        <div class="dangnhap">
            Bạn đã có tài khoản? <a href="?action=login">Đăng nhập ngay</a>
        </div>
        <form action="?action=register-store" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <input type="submit" name="register" value="Đăng ký">
            </div>
        </form>
    </div>
</body>

</html>