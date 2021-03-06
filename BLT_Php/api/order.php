<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
session_start();

$id = $_SESSION['userId'];

$sql = "select *from orders where user_id =$id";
$result = executeResult($sql);

if (!empty($_POST)) {
    $action = getPOST('action');
    $user_id = getPOST('user_id');
    $name = getPOST('name');
    $address = getPOST('address');
    $phone_number = getPOST('phone_number');
    $email = getPOST('email');
    $description = getPOST('description');
    $order_id = getPOST('order_id');

    date_default_timezone_set("Asia/Bangkok");
    $order_date = date('Y-m-d H:i:s');

    switch ($action) {
        case 'addOrder':
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total += (int)$item['num'] * (float)$item['discount'];
            }
            $sql = "INSERT INTO `orders`(`user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `total_money`)
             VALUES ('$user_id','$name','$email','$phone_number','$address','$description','$order_date',$total)";
            execute($sql);

            $sql = "select id as order_id from orders order by id desc";
            $orderIdList = executeResult($sql);

            foreach ($_SESSION['cart'] as $item) {
                $sql = 'INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `num`, `total`)
                        VALUES ("' . (int)($orderIdList[0]['order_id']) . '","' . (int)$item['id'] . '","' . (float)$item['price'] . '","' . (int)$item['num'] . '","' . (int)$item['num'] * (float)$item['discount'] . '")';
                execute($sql);

                $sql = 'UPDATE `product` SET `quantility`= (10000 - ' . $item['num'] . ') WHERE id = "' . $item['id'] . '"';
                execute($sql);
            }
            unset($_SESSION['cart']);
            break;

        case 'cancelOrder':
            $sql = "UPDATE `orders` SET `status`= 4 WHERE id = $order_id";
            execute($sql);
            break;

        case 'filterOrder':
            $id_filter = getPOST('filter_id');
            $status = getPOST('status');
            foreach ($result as $item) {
                $sql = ($status != 5 ? 'select *from order_details inner join orders INNER join product 
                where orders.id = order_details.order_id and order_details.product_id = product.id and order_id = "' . $item['id'] . '" and status =  "' . $status . '"' :
                    'select *from order_details inner join orders INNER join product 
                where orders.id = order_details.order_id and order_details.product_id = product.id and order_id = "' . $item['id'] . '"');
                $data = executeResult($sql);
                if (count($data) > 0) {
                    echo '
                    <div class="row order__details-items">
                        <div class="col-md-12 d-flex justify-content-end py-3" style ="color: #c30005; font-weight: 400; font-size: 0.875rem">
                        ' . ($item['status'] == 0 ? "CH??? X??C NH???N" : ($item['status'] == 1 ? "CH??? L???Y H??NG" : ($item['status'] == 2 ? "??ANG GIAO" : ($item['status'] == 3 ? "???? GIAO" : "???? H???Y")))) . '
                        </div>'
?>
                <?php
                    foreach ($data as $item) {
                        echo '
                            <div class="col-md-12 d-flex justify-content-between align-items-center border-bottom border-top border-1 py-3">
                            <div class ="d-flex justify-content-start align-items-center">
                                <img class="order-details__img" src="images/' . $item['thumbnail'] . '" alt="">
                                <div class="order-details__title">
                                ' . $item['title'] . '
                                <div class="order-details__num">
                                x' . $item['num'] . '
                                                </div>
                                            </div>
                                </div>
                                <div class="order-details__price">
                                        <del>' . number_format($item['price'], 0, ',', ',') . '??</del>
                                        ' . number_format($item['discount'], 0, ',', ',') . '??
                                        </div>
                                </div>
                            ';
                    }

                ?>
            <?php
                    echo '
                        <div class="col-md-12 d-flex justify-content-between py-3">
                            <div style ="color: rgba(0, 0, 0, 0.54);"><strong>?????a ch???:</strong> ' . $item['address'] . '</div>
                            <div class="d-flex justify-content-start">
                            <div class="me-2">
                            <svg width="16" height="17" viewBox="0 0 253 263" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M126.5 0.389801C126.5 0.389801 82.61 27.8998 5.75 26.8598C5.08763 26.8507 4.43006 26.9733 3.81548 27.2205C3.20091 27.4677 2.64159 27.8346 2.17 28.2998C1.69998 28.7657 1.32713 29.3203 1.07307 29.9314C0.819019 30.5425 0.688805 31.198 0.689995 31.8598V106.97C0.687073 131.07 6.77532 154.78 18.3892 175.898C30.003 197.015 46.7657 214.855 67.12 227.76L118.47 260.28C120.872 261.802 123.657 262.61 126.5 262.61C129.343 262.61 132.128 261.802 134.53 260.28L185.88 227.73C206.234 214.825 222.997 196.985 234.611 175.868C246.225 154.75 252.313 131.04 252.31 106.94V31.8598C252.31 31.1973 252.178 30.5414 251.922 29.9303C251.667 29.3191 251.292 28.7649 250.82 28.2998C250.35 27.8358 249.792 27.4696 249.179 27.2225C248.566 26.9753 247.911 26.852 247.25 26.8598C170.39 27.8998 126.5 0.389801 126.5 0.389801Z" fill="#ee4d2d"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M207.7 149.66L119.61 107.03C116.386 105.472 113.914 102.697 112.736 99.3154C111.558 95.9342 111.772 92.2235 113.33 88.9998C114.888 85.7761 117.663 83.3034 121.044 82.1257C124.426 80.948 128.136 81.1617 131.36 82.7198L215.43 123.38C215.7 120.38 215.85 117.38 215.85 114.31V61.0298C215.848 60.5592 215.753 60.0936 215.57 59.6598C215.393 59.2232 215.128 58.8281 214.79 58.4998C214.457 58.1705 214.063 57.909 213.63 57.7298C213.194 57.5576 212.729 57.4727 212.26 57.4798C157.69 58.2298 126.5 38.6798 126.5 38.6798C126.5 38.6798 95.31 58.2298 40.71 57.4798C40.2401 57.4732 39.7735 57.5602 39.3376 57.7357C38.9017 57.9113 38.5051 58.1719 38.1709 58.5023C37.8367 58.8328 37.5717 59.2264 37.3913 59.6604C37.2108 60.0943 37.1186 60.5599 37.12 61.0298V108.03L118.84 147.57C121.591 148.902 123.808 151.128 125.129 153.884C126.45 156.64 126.797 159.762 126.113 162.741C125.429 165.72 123.755 168.378 121.363 170.282C118.972 172.185 116.006 173.221 112.95 173.22C110.919 173.221 108.915 172.76 107.09 171.87L40.24 139.48C46.6407 164.573 62.3785 186.277 84.24 200.16L124.49 225.7C125.061 226.053 125.719 226.24 126.39 226.24C127.061 226.24 127.719 226.053 128.29 225.7L168.57 200.16C187.187 188.399 201.464 170.892 209.24 150.29C208.715 150.11 208.2 149.9 207.7 149.66Z" fill="#fff"></path></svg>
                            </div>
                            <div>
                            T???ng s??? ti???n: <span style ="color: #c30005;">' . number_format($item['total_money'], 0, ',', ',') . '??</span>
                            </div></div>
                        </div>
                        <div class = "col-md-12 d-flex justify-content-end">
                        ' . ($item['status'] == 0 ? "<div class ='action-cancel me-3' onclick = 'cancelOrder(" . $item['order_id'] . ")'>H???y ????n</div>" : ($item['status'] == 1 ? "<div class ='action-cancel me-3' onclick = 'cancelOrder(" . $item['order_id'] . ")'>H???y ????n</div>" : ($item['status'] == 2 ? "<div class ='action-confirm' onclick = 'confirmOrder(" . $item['order_id'] . ")'>X??c Nh???n Nh???n H??ng</div>" : ($item['status'] == 3 ? "<a href = 'product_details.php?id= " . $item['id'] . "' class ='action-rebuy me-3'>Mua L???i</a>" :
                        "<a href = 'product_details.php?id=" . $item['id'] . "'' class ='action-rebuy me-3'>Mua L???i</a>")))) . '
                        </div>
                    </div>
                    ';
                }
            }
            break;

        case 'confirmOrder':
            $sql = "UPDATE `orders` SET `status`= 3 WHERE id = $order_id";
            execute($sql);
            break;
    }
}
