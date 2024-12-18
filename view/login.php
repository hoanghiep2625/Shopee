<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Shopee</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form action="?action=check-login" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="dangky">
                Chưa có tài khoản? <a href="?action=register">Đăng ký ngay</a>
            </div>
            <div class="input-group">
                <input type="submit" name="login" value="Đăng nhập">
            </div>
        </form>
    </div>
</body>

</html>