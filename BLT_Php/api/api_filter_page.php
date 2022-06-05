<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
$index = 0;
$filterPage = 1;

if (!empty($_POST)) {
    $valueRangeMin = getPOST('valueRangeMin');
    $valueRangeMax = getPOST('valueRangeMax');
    $filterPage = getPOST('filterPage');
    $index = ((int)$filterPage - 1) * 12;
    $type = getPOST('type');
}

$sql = "select *from product where category_id = $type and price >= $valueRangeMin and price <= $valueRangeMax and deleted = 0 limit $index, 12";
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
