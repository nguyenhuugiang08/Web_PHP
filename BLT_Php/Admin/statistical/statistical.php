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
        <div class='col-12 admin__component'>
            <div class="admin__home">
                <h2 class="admin__home__heading">
                    Thông số về doanh thu
                </h2>
                <p class="admin__home__sub-heading">Số liệu về doanh thu của siêu thị</p>

                <div class="revenue">
                    <div class="revenue__by">
                        <div class="revenue__by__item">
                            <a href="statistical.php" class="revenue__by__link <?= empty($month) && empty($date) && empty($quarter) && empty($start) ? "active" : "" ?>">
                                Tổng quan</a>
                        </div>
                        <div class="revenue__by__item">
                            <p class="revenue__by__link <?= !empty($month) ? "active" : "" ?>">Theo tháng</p>
                        </div>
                        <div class="revenue__by__item">
                            <p class="revenue__by__link <?= !empty($date) ? "active" : "" ?>">Theo ngày tháng
                                năm</p>
                        </div>
                        <div class="revenue__by__item">
                            <p class="revenue__by__link <?= !empty($quarter) ? "active" : "" ?>">Theo quý</p>
                        </div>
                        <div class="revenue__by__item">
                            <p class="revenue__by__link <?= !empty($start) ? "active" : "" ?>">Theo khoản thời
                                gian</p>
                        </div>
                        <div class="revenue__line"></div>
                    </div>
                    <form method="GET" class="revenue__form _1 <?= !empty($month) ? "active" : "" ?>">
                        <input type="month" class="form-control" name="month" required value="<?= $month ?>">
                        <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">Áp
                            dụng</button>
                    </form>
                    <form method="GET" class="revenue__form _2 <?= !empty($date) ? "active" : "" ?>">
                        <input type="date" class="form-control" name="date" required value="<?= $date ?>">
                        <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">Áp
                            dụng</button>
                    </form>
                    <form method="GET" class="revenue__form _3 <?= !empty($quarter) ? "active" : "" ?>">
                        <select class="form-select" aria-label="Default select example" name="quarter" required>
                            <option selected>Chọn một quý trong năm</option>
                            <option <?= $quarter == 1 ? "selected" : "" ?> value="1">Quý 1</option>
                            <option <?= $quarter == 2 ? "selected" : "" ?> value="2">Quý 2</option>
                            <option <?= $quarter == 3 ? "selected" : "" ?> value="3">Quý 3</option>
                            <option <?= $quarter == 4 ? "selected" : "" ?> value="4">Quý 4</option>
                        </select>
                        <select class="form-select" name="year" required>
                            <?php
                            for ($y = (int) date('Y'); 1900 <= $y; $y--) : ?>
                                <option <?= $year == $y ? "selected" : "" ?> value="<?= $y; ?>"><?= $y; ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">Áp
                            dụng</button>
                    </form>
                    <form method="GET" class="revenue__form _4 <?= !empty($start) ? "active" : "" ?>">
                        <input placeholder="Ngày bắt đầu" type="text" onfocus="(this.type = 'date')" class="form-control" name="start" required value="<?= $start ?>">
                        <input placeholder="Ngày kết thúc" type="text" onfocus="(this.type = 'date')" class="form-control" name="end" required value="<?= $end ?>">
                        <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">Áp
                            dụng</button>
                    </form>
                    <div class="revenue__info">
                        <p class="revenue__info__unit">Đơn vị tính: VNĐ</p>
                        <div class="revenue__info__item">
                            <div class="revenue__info__circle revenue__info__circle--delete">
                                <p><?php
                                    $total = 0;
                                    foreach ($deleted as $row) {
                                        $total += (int) $row['total_money'];
                                    }

                                    echo number_format($total);
                                    ?></p>
                            </div>
                            <p class="revenue__info__item__title">Giá trị các đơn hủy</p>
                        </div>
                        <div class="revenue__info__item">
                            <div class="revenue__info__circle revenue__info__circle--done">
                                <p><?php
                                    $total = 0;
                                    foreach ($done as $row) {
                                        $total += (int) $row['total_money'];
                                    }

                                    echo number_format($total);
                                    ?></p>
                            </div>
                            <p class="revenue__info__item__title">Tổng doang thu (chỉ tính các đơn đã giao)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 wrapper-tag">
            <div class="wrapper-tag__title">Thống Kê Doanh Thu</div>
            <canvas id="myChart" width="-1" height="-1"></canvas>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    const items = document.querySelectorAll(".navbar--admin__item--wrap");
    const subnav = document.querySelectorAll(".navbar--admin__subnav");
    const icons = document.querySelectorAll(".navbar--admin__item__icon");

    items.forEach((item, index) => {
        item.addEventListener("click", () => {
            subnav[index].classList.toggle("active");
            icons[index].classList.toggle("active");
        });
    });

    const revenue_items = document.querySelectorAll('.revenue__by__link');
    let active_item = document.querySelector('.revenue__by__link.active');
    const line = document.querySelector('.revenue__line');

    line.style.left = active_item.offsetLeft + "px";
    line.style.width = active_item.offsetWidth + "px";

    revenue_items?.forEach((item, index) => {
        item.addEventListener("click", () => {
            active_item = document.querySelector('.revenue__by__link.active');
            active_item.classList.remove('active');
            item.classList.add('active');
            line.style.left = item.offsetLeft + "px";
            line.style.width = item.offsetWidth + "px";

            const form = document.querySelector(`.revenue__form._${index}`);
            const form_active = document.querySelector(`.revenue__form.active`);
            form_active?.classList.remove('active');
            form.classList.add('active');
        })
    })

    const ctx = document.getElementById('myChart').getContext('2d');
    console.log(ctx.canvas.width)
    const labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', ];
    const data = {
        labels: labels,
        datasets: [{
            data: [65, 59, 80, 81, 56, 55, 40],
            borderColor: 'rgb(255,0,0)',
            data: [0, 10, 5, 2, 20, 30, 45],
            tension: 0.1
        }, ]
    };

    const myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                }
            }
        },
    });
</script>