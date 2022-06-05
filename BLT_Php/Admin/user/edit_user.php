<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$fullname = $username = $email = $password = $phone_number = '';
if (!empty($_GET)) {
    $id = getGET('id');

    $query = "SELECT *FROM user where id = '$id'";
    $data = executeResultOne($query);

    if (!empty($_POST)) {
        $fullname = getPOST('fullname');
        $username = getPOST('username');
        $email = getPOST('email');
        $password = getPOST('password');
        $phone_number = getPOST('phone_number');

        date_default_timezone_set("Asia/Bangkok");
        $update_at = date('Y-m-d H:i:s');

        if ($fullname != "" && $username != "" && $email != "" && $password != "" && $phone_number != "") {
            $sql = "UPDATE `user` SET `fullname`='$fullname',`username`='$username',`email`='$email',`phone_number`='$phone_number',`password`='$password',`role_id`= 2,`updated_at`=' $update_at' WHERE id = $id";
            execute($sql);
            header('Location: admin_users.php');
            die();
        }
    }
}
require_once('../layout/admin_header.php');

?>
<div class="category">
    Danh sách khách hàng/ Cập nhật khách hàng
</div>

<div class="product-process">
    <h3 class="tile-title">Cập nhật khách hàng</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body mb-5">
                    <form class="row" method="post">
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Fullname</label>
                            <input class="form-control mt-2" type="text" name="fullname" value="<?= $data['fullname'] ?>" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Username</label>
                            <input class="form-control mt-2" type="text" name="username" value="<?= $data['username'] ?>" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Email</label>
                            <input class="form-control mt-2" type="email" name="email" value="<?= $data['email'] ?>" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Password</label>
                            <input class="form-control mt-2" type="text" name="password" value="<?= $data['password'] ?>" required>
                        </div>
                        <div class="form-group  col-md-4 mb-4">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control mt-2" type="text" name="phone_number" value="<?= $data['phone_number'] ?>" required>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Cập nhật</button>
                <a class="btn btn-danger mb-3" href="admin_users.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</div>
</div>

</html>