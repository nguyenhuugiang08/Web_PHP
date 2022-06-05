<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
session_start();

$cart = array();

if(!empty($_POST)){
    $proId = getPOST('proId');
    
    $sql = "select *from product where id =$proId and deleted = 0";
    $result = executeResultOne($sql);

    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    $cart[] = $result;
    $_SESSION['cart'] = $cart;
}

foreach($_SESSION['cart'] as $item){
    echo '
    <ul class="demo-product__list">
    <li class="demo-product__item">
        <a href = "product_details.php?id=' . $item['id'] . '" class="demo-product__link">
            <img src="images/' . $item['thumbnail'] . '" class = "demo-product__img me-4" alt="">
            <div>
                <div class ="demo-product__title">' . $item['title'] . '</div>
                <div>' . number_format($item['price'], 0, ',', ',') . 'đ</div>
            </div>
        </a>
    </li>
</ul>
    ';
}