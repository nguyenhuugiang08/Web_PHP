<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$fullname = $username = $email = $password = $phone_number = '';
if (!empty($_GET)) {
    $id = getGET('id');

    $query = "SELECT *FROM users where id = '$id'";
    $data = executeResultOne($query);

    if (!empty($_POST)) {
        $fullname = getPOST('fullname');
        $username = getPOST('username');
        $email = getPOST('email');
        $password = getPOST('password');
        $phone_number = getPOST('phone_number');

        date_default_timezone_set("Asia/Bangkok");
        $update_at = date('Y-m-d H:i:s');

        $sql = "UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`password`='$password',
        `phone_number`='$phone_number',`update_at`='$update_at' WHERE id = '$id'";

        execute($sql);

        header('Location: admin_users.php');
        die();
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
                <div class="tile-body">
                    <form class="row" method="post">
                        <div class="form-group col-md-4">
                            <label class="control-label">Fullname</label>
                            <input class="form-control" type="text" name="fullname" value="<?= $data['fullname'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Username</label>
                            <input class="form-control" type="text" name="username" value="<?= $data['username'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $data['email'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="text" name="password" value="<?= $data['password'] ?>" required>
                        </div>
                        <div class="form-group  col-md-4">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="text" name="phone_number" value="<?= $data['phone_number'] ?>" required>
                        </div>
                        <div class="form-group col-md-12 mb-5">
                            <label class="control-label">Ảnh 3x4 nhân viên</label>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
                            </div>
                            <div id="thumbbox">
                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile"><i class="fa-solid fa-file-arrow-up"></i> Upload</a>
                                <p style="clear:both"></p>
                            </div>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Cập nhật</button>
                <a class="btn btn-danger mb-3" href="admin_users.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function readURL(input, thumbimage) {
        if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#thumbimage").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else { // Sử dụng cho IE
            $("#thumbimage").attr('src', input.value);

        }
        $("#thumbimage").show();
        $('.filename').text($("#uploadfile").val());
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'default');
        $(".removeimg").show();
        $(".Choicefile").unbind('click');

    }
    $(document).ready(function() {
        $(".Choicefile").bind('click', function() {
            $("#uploadfile").click();

        });
        $(".removeimg").click(function() {
            $("#thumbimage").attr('src', '').hide();
            $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
            $(".removeimg").hide();
            $(".Choicefile").bind('click', function() {
                $("#uploadfile").click();
            });
            $('.Choicefile').css('background', '#14142B');
            $('.Choicefile').css('cursor', 'pointer');
            $(".filename").text("");
        });
    })
</script>

</html>