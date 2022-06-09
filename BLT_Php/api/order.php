<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');

if (!empty($_POST)) {
    $action = getPOST('action');
    $proId = getPOST('proId');
    $num = getPOST('num');
    $deleteId = getPOST('deleteId');

    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    switch ($action) {
        case 'addCart':
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
            break;
    }
}