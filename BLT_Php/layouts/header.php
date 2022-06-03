<?php
require_once('database/dbhelper.php');
require_once('utils/utility.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <div class="main">
        <div class="header bg-dark">
            <div class="container ">
                <div class="header-heading d-flex justify-content-between pt-2">
                    <div class="header-heading__left">
                        Kết nối
                        <i class="fa-brands fa-facebook ms-2"></i>
                        <i class="fa-brands fa-instagram ms-2"></i>
                        <i class="fa-brands fa-twitter ms-2"></i>
                    </div>
                    <div class="header-heading__right">
                        <a class="header-right__link " href="user/register_form.php">Đăng Ký</a>
                        <a class="header-right__link ms-3" href="user/index.php">Đăng Nhập</a>
                    </div>
                </div>
                <div class="header-content d-flex">
                    <div class="header-logo">
                        <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/logo-mona.png" class="header-logo__img" alt="">
                    </div>
                    <div class="header-search d-flex px-5">
                        <input type="text" class="header-search__input" style="width: 100%;">
                        <button class="btn btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="header-account">
                        <a class="header-cart d-flex">
                            <div class="header-cart__info">
                                <span>GIỎ HÀNG/</span>
                                <span>0</span>
                            </div>
                            <div class="header-cart__icon ms-3">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: #DCDCDC;">
            <div class="container">
                <div class="nav">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="../../BLT_Php/">TRANG CHỦ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">GIỚI THIỆU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">NAM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../BLT_Php/women_products.php">NỮ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ">TRẺ EM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ">PHỤ KIỆN KHÁC</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ">TIN TỨC</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ">LIÊN HỆ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>