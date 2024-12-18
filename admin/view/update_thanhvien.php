<?php include('./admin/includes/header.php'); ?>
<?php include('./admin/includes/nav.php'); ?>

<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">THÔNG TIN TÀI KHOẢN</h3>
            </div>
            <form role="form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Id</label>
                                <input type="text" class="form-control" id="username" value="<?= $user['id']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" id="username" value="<?= $user['email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" value="<?= $user['phone']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gioi_tinh">Giới tính</label>
                                <input type="text" class="form-control" id="gioi_tinh" value="<?php if ($user['gioi_tinh'] == 0) {
                                                                                                    echo "trống";
                                                                                                } else if ($user['gioi_tinh'] == 1) {
                                                                                                    echo "Nam";
                                                                                                } else {
                                                                                                    echo "Nữ";
                                                                                                } ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="capbac">Cấp bậc</label>
                                <input type="text" class="form-control" id="capbac" value="<?php if ($user['role'] == 3) {
                                                                                                echo "Admin";
                                                                                            } else {
                                                                                                echo "Người dùng";
                                                                                            } ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_create">Ngày sinh</label>
                                <input type="text" class="form-control" id="time_create" value="<?= $user['ngay_sinh'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_create">Địa chỉ</label>
                                <input type="text" class="form-control" id="time_create" value="<?= $user['address'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Tên</label>
                                <input type="text" class="form-control" id="username" value="<?= $user['name']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="browser_create">NGÀY ĐĂNG KÝ TÀI KHOẢN</label>
                        <input type="text" class="form-control" id="browser_create" value="<?= $user['thoi_gian_tao']; ?>" disabled>
                    </div>
                </div>
            </form>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">CẤP BẬC</h3>
            </div>
            <div class="form-group">
                <form role="form" method="POST" action="?action=edit_user&id=<?= $user['id'] ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">THỰC THI TÀI KHOẢN (*)</label>

                            <select class="custom-select" name="role">
                                <option value="0" <?php echo ($user['role'] == "0") ? 'selected' : ''; ?>>Người dùng</option>
                                <option value="3" <?php echo ($user['role'] == "3") ? 'selected' : ''; ?>>Admin</option>
                            </select>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit_capbac" class="btn btn-primary"><i class="fas fa-save"></i> LƯU LẠI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('admin/includes/footer.php'); ?>