<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
session_start();

if (!empty($_POST)) {
    $action = getPOST('action');
    $user_id = getPOST('user_id');
    $name = getPOST('name');
    $address = getPOST('address');
    $phone_number = getPOST('phone_number');
    $email = getPOST('email');
    $description = getPOST('description');

    date_default_timezone_set("Asia/Bangkok");
    $order_date = date('Y-m-d H:i:s');

    switch ($action) {
        case 'addOrder':
            $sql = "INSERT INTO `orders`(`user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `total_money`)
             VALUES ('$user_id','$name','$email','$phone_number','$address','$description','$order_date',1)";
            execute($sql);

            $sql = "select id as order_id from orders";
            $orderIdList = executeResult($sql);
            var_dump((int)($orderIdList[count($orderIdList) - 1]['order_id']));

            foreach ($_SESSION['cart'] as $item) {
                $sql = 'INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `num`, `total_money`)
                        VALUES ("'.(int)($orderIdList[count($orderIdList) - 1]['order_id']).'","'.(int)$item['id'].'","'.(float)$item['price'].'","'.(int)$item['num'].'","'.(int)$item['num'] * (float)$item['price'].'")';
                execute($sql);
            }
            unset($_SESSION['cart']);
            break;
    }
}
