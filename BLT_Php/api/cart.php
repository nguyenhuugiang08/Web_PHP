<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
session_start();

if (!empty($_POST)) {
    $action = getPOST('action');
    $proId = getPOST('proId');
    $num = getPOST('num');
    $deleteId = getPOST('deleteId');
    $arrayNum = getPOST('arrayNum');

    $sql = "select quantility from product where id =$proId";
    $result = executeResultOne($sql);

    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    switch ($action) {
        case 'addCart':
            if($result['quantility'] > 0){
                $is_find = false;
                for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$i]['id'] == $proId) {
                        $cart[$i]['num'] = (int)$cart[$i]['num'] + (int)$num;
                        $is_find = true;
                        break;
                    }
                }
                if (!$is_find) {
                    $sql = "select *from product where id =$proId and deleted = 0";
                    $products = executeResultOne($sql);
                    $products['num'] = $num;
                    $cart[] = $products;
                }
                $_SESSION['cart'] = $cart;
            }else {
                return;
            }
            break;
        case 'deleteCart':
            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $deleteId) {
                    array_splice($cart, $i, 1);
                    break;
                }
            }

            //update session
            $_SESSION['cart'] = $cart;
            break;
        case 'updateCart':
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                $_SESSION['cart'][$i]['num'] = $arrayNum[$i];
            }
            break;
    }
}
$sum = 0;

foreach ($_SESSION['cart'] as $item) {
    echo '
    <ul class="demo-product__list">
        <li class="demo-product__item d-flex justify-content-between align-items-center">
            <a href = "product_details.php?id=' . $item['id'] . '" class="demo-product__link">
                <img src="images/' . $item['thumbnail'] . '" class = "demo-product__img me-4" alt="">
                <div>
                    <div class ="demo-product__title">' . $item['title'] . '</div>
                    <div>' . $item['num'] . ' x ' . number_format($item['price'], 0, ',', ',') . '??</div>
                </div>
            </a>
            <div class = "cart-cancel" onclick = "deleteProductCart(' . $item['id'] . ')">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </li>
    </ul>
    ';
    $sum += (int)$item['num'] * (float)$item['price'];
}
echo '
    <div>
        T???NG: ' . number_format($sum, 0, ',', ',') . '??
    </div>
    <a href = "order.php" class ="show-order">
        XEM GI??? H??NG
    </a>
    <a href = "pay.php" class ="show-pay mt-2">
        THANH TO??N
    </a>
';
