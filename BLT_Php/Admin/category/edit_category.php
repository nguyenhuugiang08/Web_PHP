<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$name =  '';
if (!empty($_GET)) {
    $id = getGET('id');

    $query = "SELECT *FROM category where id = '$id'";
    $data = executeResultOne($query);

    if (!empty($_POST)) {
        $name = getPOST('name');

        date_default_timezone_set("Asia/Bangkok");
        $update_at = date('Y-m-d H:i:s');

        $sql = "UPDATE `category` SET `name`='$name',`updated_at`='$update_at' WHERE id = $id";

        execute($sql);

        header('Location: admin_categories.php');
        die();
    }
}
require_once('../layout/admin_header.php');

?>
<div class="category">
    Danh sách khách hàng/ Cập nhật danh mục
</div>

<div class="product-process">
    <h3 class="tile-title">Cập nhật danh mục</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <div class="form-group col-md-4 mb-5">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control mt-2" type="text" name="name" value="<?= $data['name'] ?>" required>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Cập nhật</button>
                <a class="btn btn-danger mb-3" href="admin_categories.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</div>
</div>

</html>