<?php include('./admin/includes/header.php'); ?>
<?php include('./admin/includes/nav.php'); ?>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->
<button class="btn btn-primary" onclick="window.location.href='?action=them'">Thêm sản phẩm</button>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DANH SÁCH SẢN PHẨM</h3>
                <div class="text-right">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>Ảnh</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $product['id'] ?></td>
                                    <td><?= $product['name'] ?></td>
                                    <td><img src="<?= $product['img'] ?>" alt="" width="50px" height="auto"></td>
                                    <td><a href="?action=sua&id=<?= $product['id'] ?>">Edit</a>

                                        <form action="?action=xoa&id=<?= $product['id'] ?>" method="POST" style="display:inline;">
                                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                                            <button type="submit" name="delete_product" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" class="btn btn-danger btn-sm">Xóa</button>
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


<?php include('admin/includes/footer.php'); ?>