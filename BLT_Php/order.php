<?php
require_once('layouts/header.php');

?>

<style>
    <?php
    require_once('css/base.css');
    require_once('css/order.css');
    ?>
</style>
<div class="container order-main mb-5">
    <div class="row">
        <div class="col-md-7 border-end">
            <div class="row order-title" style="font-weight: 700;">
                <div class="col-md-6">
                    SẢN PHẨM
                </div>
                <div class="col-md-2">
                    GIÁ
                </div>
                <div class="col-md-2">
                    SỐ LƯỢNG
                </div>
                <div class="col-md-2">
                    TỔNG
                </div>
            </div>

            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo '
                    <div class="row my-4 align-items-center order-product">
                            <div class="col-md-6">
                                <div  class="order-product__item">
                                    <div class="cart-cancel" onclick="deleteProductCart(' . $item['id'] . ')">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                    <div>
                                        <a href="product_details.php?id=' . $item['id'] . '" class="order-product__link">
                                            <div class="order-product__link-item">
                                                <img src="images/' . $item['thumbnail'] . '" class="order-product__img me-4" alt="">
                                                <div class="order-product__title">' . $item['title'] . '</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 fw-bold">
                                ' . number_format($item['price'], 0, ',', ',') . '<ins>đ</ins>
                            </div>
                            <div class="detail-num col-md-2">
                                <div class="detail-btn-decrease">-</div>
                                <div class="num-product">'.$item['num'].'</div>
                                <div class="detail-btn-increase">+</div>
                            </div>
                            <div class="col-md-2 fw-bold">
                                ' . number_format((int)$item['num'] * (float)$item['price'], 0, ',', ',') . '<ins>đ</ins>
                            </div>
                    </div>
                ';
                }
            }
            ?>
            <div class="col-md-12 order-action mt-5">
                <a href="index.php" class="btn-continue">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    TIẾP TỤC XEM HÀNG
                </a>
                <a class="btn-update" onclick="updateCart()">
                    CẬP NHẬT GIỎ HÀNG
                </a>
            </div>
        </div>
        <div class="col-md-5 px-4">
            <div class="row">
                <div class="col-md-12 border-bottom border-4 pb-3 d-flex justify-content-between align-items-center">
                    <strong>TỔNG SỐ LƯỢNG</strong>
                    <div class="fw-bold">
                        <?php
                        $sum = 0;
                        if (isset(($_SESSION['cart']))) {
                            foreach ($_SESSION['cart'] as $item) {
                                $sum += (int)$item['num'];
                            }
                        }
                        echo $sum;
                        ?>
                    </div>
                </div>
                <div class="col-md-12 border-bottom pb-3 mt-4 d-flex justify-content-between align-items-center">
                    <div>Tổng phụ</div>
                    <div class="fw-bold">
                        <?php
                        $sum = 0;
                        if (isset(($_SESSION['cart']))) {
                            foreach ($_SESSION['cart'] as $item) {
                                $sum += (int)$item['num'] * (float)$item['price'];
                            }
                        }
                        echo number_format($sum, 0, ',', ',') . "<ins><ins>đ</ins></ins>";
                        ?>
                    </div>
                </div>
                <div class="col-md-12 border-bottom  pb-3 mt-4 d-flex justify-content-between align-items-center">
                    <div>Giao hàng</div>
                    <div class="shiper">
                        <div class="d-flex justify-content-end">Giao hàng miễn phí</div>
                        <div class="d-flex justify-content-end">Ước tính cho Việt Nam</div>
                        <div class="d-flex justify-content-end">Đổi địa chỉ</div>
                    </div>
                </div>
                <div class="col-md-12 border-bottom border-4 pb-3 mt-4 d-flex justify-content-between align-items-center">
                    <div>Tổng</div>
                    <div class="fw-bold">
                        <?php
                        $sum = 0;
                        if (isset(($_SESSION['cart']))) {
                            foreach ($_SESSION['cart'] as $item) {
                                $sum += (int)$item['num'] * (float)$item['price'];
                            }
                        }
                        echo number_format($sum, 0, ',', ',') . "<ins><ins>đ</ins></ins>";
                        ?>
                    </div>
                </div>
                <a href="pay.php" class="col-md-12 btn-pay my-4">
                    TIẾN HÀNH THANH TOÁN
                </a>
            </div>
        </div>
    </div>
</div>
<?php
require_once('layouts/footer.php');
?>
<script>
    let decreaseElement = document.querySelectorAll('.detail-btn-decrease')
    let increaseElement = document.querySelectorAll('.detail-btn-increase')
    let numElement = document.querySelectorAll('.num-product')

    decreaseElement.forEach((element, index) => {
        element.onclick = () => {
            if (Number(numElement[index].innerText) > 1) {
                let content = (Number(numElement[index].innerText) - 1).toString()
                numElement[index].innerHTML = content
            }
        }
    });

    increaseElement.forEach((element, index) => {
        element.onclick = () => {
            let content = (Number(numElement[index].innerText) + 1).toString()
            numElement[index].innerHTML = content
        }
        
    });
    
    function updateCart() {
        let arrayNum = []
    
        numElement.forEach(element => {
            arrayNum.push(element.innerText)
        });
        $.post('api/cart.php', {
            "action": "updateCart",
            "arrayNum": arrayNum
        }, function(data){
            location.reload()
        })
    }
</script>

</html>