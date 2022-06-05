<?php
require_once('../layout/admin_header.php');
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$fullname = $username = $email = $password = $phone_number = '';
if (!empty($_POST)) {
    $fullname = getPOST('fullname');
    $username = getPOST('username');
    $email = getPOST('email');
    $password = getPOST('password');
    $phone_number = getPOST('phone_number');

    date_default_timezone_set("Asia/Bangkok");
    $create_at = $update_at = date('Y-m-d H:i:s');

    if ($fullname != '' && $username != '' && $email != '' && $password != '' && $phone_number != '') {
        var_dump($fullname,$username,$email,$password,$phone_number);
        $sql ="INSERT INTO `user`(`fullname`, `username`, `email`, `phone_number`, `password`, `role_id`, `created_at`, `updated_at`)
         VALUES ('$fullname','$username','$email','$phone_number','$password',2,'$create_at','$update_at')";
        execute($sql);
    }
}
?>
<div class="category">
    Danh sách khách hàng/ Tạo khách hàng mới
</div>

<div class="product-process">
    <h3 class="tile-title">Tạo mới khách hàng</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body mb-5">
                    <form class="row" method="post">
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Fullname</label>
                            <input class="form-control mt-2" type="text" name="fullname" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Username</label>
                            <input class="form-control mt-2" type="text" name="username" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Email</label>
                            <input class="form-control mt-2" type="email" name="email" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label class="control-label">Password</label>
                            <input class="form-control mt-2" type="text" name="password" required>
                        </div>
                        <div class="form-group  col-md-4 mb-4">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control mt-2" type="text" name="phone_number" required>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Lưu lại</button>
                <a class="btn btn-danger mb-3" href="admin_users.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</div>
</div>

</html>