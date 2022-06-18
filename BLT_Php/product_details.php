<?php
require_once('database/dbhelper.php');
require_once('utils/utility.php');
require_once('layouts/header.php');

if (!empty($_GET)) {
    $id = getGET('id');

    $sql = "select *from product where id = $id";
    $product = executeResultOne($sql);

    $cate_id = $product['category_id'];

    $sql = "select *from category where id = $cate_id";
    $category = executeResultOne($sql);
}

$firstname = $lastname = $email = $phone_number = $evaluate = '';
if (!empty($_POST)) {
    $firstname = getPOST('firstname');
    $lastname = getPOST('lastname');
    $email = getPOST('email');
    $phone_number = getPOST('phone_number');
    $evaluate = getPOST('evaluate');
    var_dump($firstname);

    date_default_timezone_set("Asia/Bangkok");
    $create_at = $update_at = date('Y-m-d H:i:s');

    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone_number) && !empty($evaluate)) {
        $sql = "INSERT INTO feedback(firstname, lastname, email, phone_number, subject_name,created_at, updated_at)
         VALUES ('$firstname','$lastname','$email','$phone_number','$evaluate','$create_at','$update_at')";
        execute($sql);
    }
}
?>
<style>
    <?php
    require_once('css/base.css');
    require_once('css/detail.css');
    ?>
</style>
<div class="container detail-main">
    <div class="row">
        <div class="col-md-5">
            <div style="background-image: url('images/<?= $product['thumbnail'] ?>');" class="detail-img">
            </div>
        </div>
        <div class="col-md-7">
            <div class="detail-nav">
                <a href="index.php">TRANG CHỦ</a>/
                <a href=""><?= mb_strtoupper($category['name'], $encoding = 'UTF-8') ?></a>
            </div>
            <div class="detail-title">
                <h2><?= $product['title'] ?></h2>
            </div>
            <div class="detail-price">
                <?= number_format($product['price'], 0, ',', '.') ?>đ
            </div>
            <div class="detail-action">
                <div class="detail-num">
                    <div class="me-3">Số Lượng:</div>
                    <div class="detail-btn-decrease">-</div>
                    <div class="num-product">1</div>
                    <div class="detail-btn-increase">+</div>
                </div>
                <a href="../BLT_Php/cart.php" class="detail-add__cart">
                    <i class="fa-solid fa-cart-plus"></i>
                    THÊM VÀO GIỎ
                </a>
            </div>
            <div class="detail-pay">
                <div class="row m-4">
                    <div class="col-md-6">
                        <div class="detail-pay__title">Tính phí ship tự động</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-pay__title">Thanh toán</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-ghn.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-ghtk.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-ninja-van.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-acb.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-techcombank.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-vib.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-shipchung.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-viettle-post.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-vn-post.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-vcb.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-paypal.jpg');"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="detail-pay__img" style="background-image: url('http://mauweb.monamedia.net/converse/wp-content/uploads/2018/10/logo-mastercard.jpg');"></div>
                    </div>
                </div>
            </div>
            <div class="detail-pay__para">Hãy trở thành Affilicate của chúng tôi để tìm thêm thu nhập thụ động, kiếm tiền online</div>
            <div class="btn-register__aff">Đăng ký Affilicate</div>
            <div class="detail-type">
                <div class="detail-type__item">
                    Mã: <?= $product['id'] ?>
                </div>
                <div class="detail-type__item">
                    Danh mục: <?= $category['name'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row detail-additional">
        <div class="category">
            <div class="detail-additional__item detail-addition">
                THÔNG TIN BỔ SUNG
            </div>
            <div class="detail-additional__item detail-feedback">
                ĐÁNH GIÁ
            </div>
        </div>
        <div class="addition">
            <div class="row mt-3 addition-item">
                <div class="col-md-6">SKU</div>
                <div class="col-md-6">1000828883<?= $product['id'] ?></div>
            </div>
            <div class="row mt-3 addition-item">
                <div class="col-md-6">CHẤT LIỆU</div>
                <div class="col-md-6">Cotton</div>
            </div>
            <div class="row mt-3 addition-item">
                <div class="col-md-6">GIỚI TÍNH</div>
                <div class="col-md-6"><?= $category['id'] == 1 ? "Nam" : ($category['id'] == 2 ? "Nữ" : ($category['id'] == 3 ? "Nam, Nữ" : "Trẻ Em")) ?></div>
            </div>
            <div class="row mt-3 addition-item">
                <div class="col-md-6">GỬI TỪ</div>
                <div class="col-md-6">Hà Nội</div>
            </div>
            <div class="row mt-3 addition-item">
                <div class="col-md-6">XUẤT XỨ</div>
                <div class="col-md-6">Mỹ</div>
            </div>
        </div>
        <div class="feedback">
            <div class="feedback-title px-5">Đánh giá của bạn về sản phẩm "<?= $product['title'] ?>"</div>
            <div class="container p-5">
                <form method="post">
                    <div class="form-row row mb-4">
                        <div class="form-group col-md-6">
                            <label for="firstname">Fisrt name</label>
                            <input type="text" class="form-control mt-2" required name="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control mt-2" required name="lastname">
                        </div>
                    </div>
                    <div class="form-row row mb-4">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mt-2" required name="email">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone_number">Phone number</label>
                            <input type="text" class="form-control mt-2" required name="phone_number">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label class="control-label">Nhận xét của bạn</label>
                        
                        <div id="editor">
                            <textarea class="form-control mt-2" required name="evaluate" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" onclick="addFeedback()">Gửi Đi</button>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="title-product">SẢN PHẨM TƯƠNG TỰ</div>
        <div class="slider autoplay">
            <?php
            $sql = "select *from product where category_id = $cate_id and id != $id limit 8";
            $productList = executeResult($sql);
            foreach ($productList as $item) {
                echo '
                        <div class="col-md-3 card-product">
                                <a href = "product_details.php?id=' . $item['id'] . '">
                                    <img src="images/' . $item['thumbnail'] . '" class="card-img-top" alt="...">
                                </a>
                                <div class="d-flex justify-content-center flex-md-column align-items-center p-4">
                                    <a href = "product_details.php?id=' . $item['id'] . '" class="card-title">' . $item['title'] . '</a>
                                    <div class = "price my-1">' . number_format($item['price'], 0, ',', '.') . 'đ</div>
                                    <a class="add-cart" onclick = "addCart(' . $item['id'] . ')">Thêm vào giỏ</a>
                                </div>
                        </div>          
                        ';
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once('layouts/footer.php');
?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    let decreaseElement = document.querySelector('.detail-btn-decrease')
    let increaseElement = document.querySelector('.detail-btn-increase')
    let numElement = document.querySelector('.num-product')

    decreaseElement.onclick = () => {
        if (Number(numElement.innerText) > 1) {
            let content = (Number(numElement.innerText) - 1).toString()
            numElement.innerHTML = content
        }
    }

    increaseElement.onclick = () => {
        let content = (Number(numElement.innerText) + 1).toString()
        numElement.innerHTML = content
    }

    let deAdditionElement = document.querySelector('.detail-addition')
    let deFeedbackElement = document.querySelector('.detail-feedback')
    let additionElement = document.querySelector('.addition')
    let feedbackElement = document.querySelector('.feedback')

    deAdditionElement.onclick = () => {
        additionElement.style.display = "block"
        deAdditionElement.style.borderBottom = "2px solid #c30005"
        deFeedbackElement.style.borderBottom = "0px solid #c30005"
        feedbackElement.style.display = "none"
    }

    deFeedbackElement.onclick = () => {
        feedbackElement.style.display = "block"
        deFeedbackElement.style.borderBottom = "2px solid #c30005"
        deAdditionElement.style.borderBottom = "0px solid #c30005"
        additionElement.style.display = "none"
    }

    $('.autoplay').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    let btnPrevElement = document.querySelector('.slick-prev')
    let btnNextElement = document.querySelector('.slick-next')

    btnPrevElement.innerHTML = '<i class="fa-solid fa-angle-left"></i>'
    btnNextElement.innerHTML = '<i class="fa-solid fa-angle-right"></i>'

    // // edit text
    // DecoupledEditor.create(document.querySelector("#editor"))
    //     .then((editor) => {
    //         const toolbarContainer = document.querySelector("#toolbar-container");

    //         toolbarContainer.appendChild(editor.ui.view.toolbar.element);
    //     })
    //     .catch((error) => {
    //         console.error(error);
    //     });
</script>

</html>