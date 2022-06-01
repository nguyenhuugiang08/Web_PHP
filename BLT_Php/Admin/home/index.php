<?php
include_once('../layout/admin_header.php');
?>

<?php
require_once('../layout/admin_header.php');
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$sql = "select count(id) as countUser from user where role_id = '2'";
$countUser = executeResultOne($sql);

$sql = "select count(id) as countProduct from product";
$countProduct = executeResultOne($sql);

$sql = "select count(id) as countCate from category";
$countCate = executeResultOne($sql);

$sql = "select count(id) as countFeedback from feedback";
$countFeedback = executeResultOne($sql);

?>

<div class="home-content">
    <h3 class="tile-title">Trang chủ</h3>
    <section class="home-content__box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-info">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3><?= $countCate['countCate'] ?></h3>
                                <h4>DANH MỤC</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-clipboard-list" style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="../category/admin_categories.php" class="small-box-footer small-box-footer__link">
                            Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-success">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3><?= $countProduct['countProduct'] ?></h3>
                                <h4>SẢN PHẨM</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-brands fa-product-hunt " style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="../product/admin_products.php" class="small-box-footer small-box-footer__link">Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-warning">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3><?= $countUser['countUser'] ?></h3>
                                <h4 style="color: #fff">THÀNH VIÊN</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-plus " style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="../user/admin_users.php" class="small-box-footer small-box-footer__link">Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-danger">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3><?=$countCate['countCate']?></h3>
                                <h4>ĐƠN HÀNG</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-cart-plus" style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="#" class="small-box-footer small-box-footer__link">Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-primary">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3><?=$countFeedback['countFeedback']?></h3>
                                <h4>PHẢN HỒI</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-cart-plus" style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="#" class="small-box-footer small-box-footer__link">Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- small box -->
                    <div class="small-box p-3 pt-4 pb-2 rounded-3 mt-4 bg-secondary">
                        <div class="inner d-flex justify-content-between mb-4">
                            <div>
                                <h3>65</h3>
                                <h4>ĐƠN HÀNG</h4>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-cart-plus" style="color: rgba(0,0,0,0.2); font-size: 72px;"></i>
                            </div>
                        </div>
                        <a href="#" class="small-box-footer small-box-footer__link">Chi tiết <i class="fas fa-arrow-circle-right small-box__icon"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
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