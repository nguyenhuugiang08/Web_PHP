<?php
require_once('../layout/admin_header.php');
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$title = $cate_id = $price = $description = $thumbnail = $discount = '';
if (!empty($_POST)) {
    $title = getPOST('title');
    $cate_id = getPOST('cate_id');

    $sql = "SELECT id FROM category WHERE name = '$cate_id'";
    $array_id = executeResultOne($sql);
    $id = $array_id['id'];

    $price = getPOST('price');
    $discount = getPOST('discount');
    $thumbnail = getPOST('ImageUpload');
    $description = getPOST('description');

    $create_at = $update_at = date('Y-m-d H:i:s');

    if ($title != '' && $cate_id != '' && $price != '' && $discount != '' && $thumbnail != '' && $description != '') {
        $sql = "INSERT INTO product(category_id, title, price, discount, thumbnail, description, created_at, updated_at)
         VALUES ('$id','$title','$price','$discount','$thumbnail','$description','$create_at','$update_at')";

        execute($sql);
    }
}

$sql = "SELECT * FROM category";
$data = executeResult($sql);
?>

<div class="category">
    Danh sách sản phẩm/ Tạo sản phẩm mới
</div>

<div class="product-process">
    <h3 class="tile-title">Tạo mới sản phẩm</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <div class="form-group mb-3 col-md-4">
                            <label for="floatingSelect">Danh mục sản phẩm</label>
                            <select class="form-select" id="floatingSelect"  name = "cate_id">
                                <?php
                                foreach ($data as $item) {
                                    $selected = "";
                                    if($item['name'] == "Nam"){
                                        $selected = "selected";
                                    }else $selected = "";
                                    echo '
                                        <option '.$selected.'>'.$item['name'].'</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="control-label">Title</label>
                            <input class="form-control" type="text" name="title" required>
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" type="text" name="price" required>
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="control-label">Giá bán giảm giá</label>
                            <input class="form-control" type="text" name="discount" required>
                        </div>
                        <div class="form-group col-md-12">
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
                        <div class="form-group col-md-12 mb-5">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="description" id="mota"></textarea>
                            <script>
                                CKEDITOR.replace('mota');
                            </script>
                        </div>
                </div>
                <button class="btn btn-success mb-3" type="submit">Lưu lại</button>
                <a class="btn btn-danger mb-3" href="admin_products.php">Hủy bỏ</a>
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