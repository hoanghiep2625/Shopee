<?php
include "./includes/header.php";
?>
<link rel="stylesheet" href="./css/profile.css">

<article>
    <div class="grid">
        <div class="avt">
            <img src="./public/image/images.jpeg" alt="Avatar">
        </div>
        <div class="info">
            <h1>Thông tin tài khoản</h1>
            <div class="info-item">
                <p>Ngày tham gia</p>
                <input type="text" value="<?= $user["thoi_gian_tao"] ?>" disabled>
            </div>
            <div class="info-item">
                <p>Địa chỉ</p>
                <input type="text" name="address" value="<?= htmlspecialchars($user["address"] ?? 'trống') ?>" disabled>

            </div>
            <div class="info-item">
                <form action="?action=capnhatinfo" method="post">
                    <p>Giới tính</p>
                    <select name="gioitinh">
                        <option value="" <?= $user['gioi_tinh'] == 0 ? "selected" : "" ?>>Không công khai</option>
                        <option value="1" <?= $user['gioi_tinh'] == 1 ? "selected" : "" ?>>Nam</option>
                        <option value="2" <?= $user['gioi_tinh'] == 2 ? "selected" : "" ?>>Nữ</option>
                    </select>

            </div>
            <div class="info-item">
                <p>Ngày sinh</p>
                <input type="date" name="ngaysinh" value="<?= htmlspecialchars($user["ngay_sinh"] ?? 'trống') ?>">
            </div>

            <div class="info-item">
                <p>Email</p>
                <input type="text" value="<?= $user["email"] ?>" disabled>
            </div>
            <button class="capnhatinfo">Cập nhật thông tin</button>
            </form>
        </div>
    </div>
    <div class="grid">
        <div class="doimk">
            <h1>Đổi mật khẩu</h1>
            <form action="?action=changepassword" method="post">
                <div class="info-item">
                    <p>Mật khẩu cũ</p>
                    <input name="old_password" type="password" placeholder="Nhập mật khẩu cũ">
                </div>
                <div class="info-item">
                    <p>Mật khẩu mới</p>
                    <input name="new_password" type="password" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="info-item">
                    <p>Nhập lại mật khẩu mới</p>
                    <input name="re_password" type="password" placeholder="Nhập lại mật khẩu mới">
                </div>
                <button class="doimatkhau">Đổi mật khẩu</button>
            </form>
        </div>
        <div class="diachi">
            <h1>Địa chỉ giao hàng</h1>
            <form action="?action=capnhatdiachi" method="post">
                <div class="info-item">
                    <p>Tên khách hàng</p>
                    <input type="text" name="name" placeholder="<?= htmlspecialchars($user["name"] ?? 'trống') ?>">
                </div>
                <div class="info-item">
                    <p>Địa chỉ</p>
                    <input type="text" name="address" placeholder="<?= htmlspecialchars($user["address"] ?? 'trống') ?>">
                </div>
                <div class="info-item">
                    <p>Số điện thoại</p>
                    <input type="text" name="phone" placeholder="<?= htmlspecialchars($user["phone"] ?? 'trống') ?>">
                </div>
                <button class="capnhatdiachi">Cập nhật địa chỉ</button>
            </form>
        </div>
    </div>
</article>

<?php
require_once './includes/footer.php';
?>