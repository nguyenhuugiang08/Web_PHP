<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');

if (!empty($_POST)) {
    $payload = getPOST('payload');
}


if ($payload == 0) {
    $sql = "select *from product where category_id = 2 limit 12 ";
    $productList = executeResult($sql);
}
if ($payload == 1) {
    $sql = "select `id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, date(`created_at`), `updated_at`, `deleted` 
    from product where category_id = 2 order by created_at desc limit 12 ";
    $productList = executeResult($sql);
}
if ($payload == 2) {
    $sql = "select *from product where category_id = 2 order by price asc limit 12 ";
    $productList = executeResult($sql);
}
if ($payload == 3) {
    $sql = "select *from product where category_id = 2 order by price desc limit 12 ";
    $productList = executeResult($sql);
}
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
