<?php include('./admin/includes/header.php'); ?>
<?php include('./admin/includes/nav.php');
// Hiển thị thông báo lỗi từ session nếu có
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['message']) . '</div>';
    unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị
}
?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Thêm Danh Mục Mới</h1>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm Danh Mục</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="?action=themdanhmucsanpham" method="POST">
                    <div class="form-group">
                        <label for="category_name">Tên Danh Mục:</label>
                        <input type="text" id="category_name" name="category_name" class="form-control" required>
                    </div>
                    <button type="submit" name="themdanhmucsanpham" class="btn btn-primary">Thêm Danh Mục</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<?php include('./admin/includes/footer.php'); ?>