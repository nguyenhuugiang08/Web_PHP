<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$sql = "SELECT *from users WHERE role ='Admin'";
$result = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/admin.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Trang quản trị</title>
</head>

<body>
    <div class="main">
        <nav class="nav-category">
            <div class="nav-category__info">
                <img src="https://lh3.googleusercontent.com/a-/AOh14Gg38uWNyO9BTDmSGx-aZRH--NzshOtQ-wyL7RXU2A=s360-p-rw-no" class="avatar" alt="">
                <span><?= $result['0']['fullname'] ?></span>
            </div>
            <ul class="control-list">
                <li class="control-list__item">
                    <a href="" class="control-list__item-link">
                        <i class="fa-solid fa-cart-shopping control-list__icon"></i>
                        POS Bán Hàng</a>
                </li>
                <li class="control-list__item">

                    <a href="../home/index.php" class="control-list__item-link">
                        <i class="fa-solid fa-house control-list__icon"></i>
                        Trang Chủ</a>

                </li>
                <li class="control-list__item">
                    <a href="../product/admin_products.php" class="control-list__item-link">
                        <i class="fa-brands fa-product-hunt control-list__icon"></i>
                        Quản Lý Sản Phẩm</a>

                </li>
                <li class="control-list__item">
                    <a href="../user/admin_users.php" class="control-list__item-link">
                        <i class="fa-solid fa-user control-list__icon"></i>
                        Quản Lý Khách Hàng</a>
                </li>

                <li class="control-list__item">
                    <a href="../category/admin_categories.php" class="control-list__item-link">
                        <i class="fa-solid fa-clipboard-list control-list__icon"></i>
                        Quản Lý Danh Mục</a>
                </li>
                <li class="control-list__item">
                    <a href="../order/admin_orders.php" class="control-list__item-link">
                        <i class="fa-solid fa-clipboard-list control-list__icon"></i>
                        Quản Lý Đơn Hàng</a>
                </li>

                <li class="control-list__item">
                    <a href="" class="control-list__item-link">
                        <i class="fa-solid fa-dollar-sign control-list__icon"></i>
                        Thống Kê</a>
                </li>
            </ul>
        </nav>

        <div class="content">
            <div class="header">
                <a href="../user/" class="header-link">
                    <button class="btn btn-warning">
                        <i class="fa-solid fa-right-to-bracket header-link__icon"></i>
                        Logout
                    </button>
                </a>
            </div>