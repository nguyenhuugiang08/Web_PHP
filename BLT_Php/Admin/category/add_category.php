<?php
require_once('../layout/admin_header.php');
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$name = '';
if (!empty($_POST)) {
    $name = getPOST('name');
    $create_at = $update_at = date('Y-m-d H:s:i');

    if ($name != '') {
        $sql = "INSERT INTO category(name, created_at, updated_at)
         VALUES ('$name','$create_at','$update_at')";

        execute($sql);
    }
}
?>

<div class="category">
    Danh sách danh mục sản phẩm/ Tạo danh mục mới
</div>

<div class="product-process">
    <h3 class="tile-title">Tạo mới danh mục</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <div class="form-group mb-5 col-md-4">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control mt-1" type="text" name="name" required>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Lưu lại</button>
                <a class="btn btn-danger mb-3" href="admin_categories.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</div>
</div>
</html>