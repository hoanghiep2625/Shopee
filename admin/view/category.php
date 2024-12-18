<?php include('./admin/includes/header.php'); ?>
<?php include('./admin/includes/nav.php'); ?>

<div class="row mb-2">
    <div class="col-sm-6">
        <!-- Có thể thêm thông tin hoặc chức năng khác ở đây -->
    </div><!-- /.col -->
</div><!-- /.row -->
<button class="btn btn-primary" onclick="window.location.href='?action=themdanhmuc'">Thêm danh mục</button>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DANH MỤC</h3>

                <div class="text-right">
                    <!-- Có thể thêm nút thêm danh mục ở đây -->
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($category['id']); ?></td>
                                    <td><?= htmlspecialchars($category['name']); ?></td>
                                    <td>
                                        <a href="?action=sua_danhmuc&id=<?= htmlspecialchars($category['id']); ?>">Edit</a>
                                        <!-- Nút Xóa -->
                                        <form action="?action=xoaCategory&id=<?= htmlspecialchars($category['id']); ?>" method="POST" style="display:inline;">
                                            <input type="hidden" name="category_id" value="<?= htmlspecialchars($category['id']); ?>">
                                            <button type="submit" name="delete_category" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<?php include('./admin/includes/footer.php'); ?>