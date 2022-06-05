<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
$index = 0;
$currentPage = 1;

if (!empty($_POST)) {
    $currentPage = getPOST('currentPage');
    $index = ((int)$currentPage - 1) * 12;
    $type = getPOST('type');
}

$sql = "select count(id) as countId from product where category_id = $type and deleted = 0 ";
$countId = executeResultOne($sql);

$pages = ceil((int)$countId['countId'] / 12);

$sql = "select *from product where category_id = $type and deleted = 0 limit $index, 12 ";
$productList = executeResult($sql);

foreach ($productList as $item) {
    echo '
        <div class="col-md-3 card-product ">
                <div class="women-product__detail">
                    <a href = "product_details.php?id=' . $item['id'] . '">
                        <img src="images/' . $item['thumbnail'] . '" class="card-img-top" alt="...">
                        </a>
                    <div class="d-flex justify-content-center flex-md-column align-items-center p-4">
                        <a href = "product_details.php?id=' . $item['id'] . '" class="card-title">' . $item['title'] . '</a>
                        <div class = "price my-1">' . number_format($item['price'], 0, ',', '.') . 'đ</div>
                        <a href="#" class="add-cart">Thêm vào giỏ</a>
                    </div>
                </div>
        </div>          
        ';
}
