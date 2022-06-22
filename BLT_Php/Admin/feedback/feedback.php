<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$date = $month = $year = $quarter = $start = $end = "";

$sql = "SELECT * FROM orders";

if (!empty($_GET)) {
    $date = getGet('date');
    $month = getGet('month');
    $year = getGet('year');
    $quarter = getGet('quarter');
    $start = getGet('start');
    $end = getGet('end');

    if (!empty($date)) {
        $sql = "SELECT * FROM orders WHERE DATE(order_date) = '$date'";
    }

    if (!empty($month)) {
        $sql = "SELECT * FROM orders WHERE DATE_FORMAT(order_date, '%Y-%m') = '$month'";
    }

    if (!empty($year) && !empty($quarter)) {
        $str = "";
        switch ($quarter) {
            case '1':
                $str = "BETWEEN 1 AND 3";
                break;
            case '2':
                $str = "BETWEEN 4 AND 6";
                break;
            case '3':
                $str = "BETWEEN 7 AND 9";
                break;
            case '4':
                $str = "BETWEEN 10 AND 12";
                break;

            default:
                break;
        }
        $sql = "SELECT * FROM orders WHERE MONTH(order_date) $str AND YEAR(order_date) = '$year'";
    }

    if (!empty($start) && !empty($end)) {
        $sql = "SELECT * FROM orders WHERE DATE(order_date)  BETWEEN '$start' AND '$end'";
    }
}
$orders = executeResult($sql);

$wait = array();
foreach ($orders as $row) {
    if ($row['status'] == 0) {
        $wait[] = $row;
    }
}

$do = array();
foreach ($orders as $row) {
    if ($row['status'] == 1) {
        $do[] = $row;
    }
}

$done = array();
foreach ($orders as $row) {
    if ($row['status'] == 3) {
        $done[] = $row;
    }
}

$deleted = array();
foreach ($orders as $row) {
    if ($row['status'] == 4) {
        $deleted[] = $row;
    }
}

$products = executeResult("SELECT * FROM product");

$disableProduct = array();

foreach ($products as $row) {
    if ($row['deleted'] == 1) {
        $disableProduct[] = $row;
    }
}

$categories = executeResult("SELECT * FROM category");

$feedbacks = executeResult("SELECT * FROM feedback");


require_once('../layout/admin_header.php');
?>
<div class="category">
    Thống kê
</div>

<div class="product-process">
    <div class="row py-5">

    </div>
</div>
</div>
</div>
</div>
</div>