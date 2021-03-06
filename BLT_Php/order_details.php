<?php
require_once('layouts/header.php');
$id = $_SESSION['userId'];

$sql = "select *from orders where user_id =$id";
$result = executeResult($sql);
?>

<style>
    <?php
    require_once('css/base.css');
    require_once('css/order_details.css');
    ?>
</style>
<div class="wrapper-order__details">
    <div class="container order-details-main">
        <div class="row">
            <div class="col-md-3">
                <a class="header-avatar order-avatar">
                    <img src="https://i.pravatar.cc/150?img=<?= $_SESSION['userId'] ?>" alt="Avatar" class="header-avatar__img">
                    <div class="header-avatar__username"><?= $userName['username'] ?></div>
                </a>
                <ul class="account-detail">
                    <li class="account-detail__item"><i class="fa-solid fa-user"></i>Tài khoản của tôi
                        <ul>
                            <li>Đổi mật khẩu</li>
                        </ul>
                    </li>
                    <li class="account-detail__item"><i class="fa-solid fa-clipboard-list me-3"></i>Đơn mua</li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2 filter-order filter-order--active" status="5">Tất cả</div>
                    <div class="col-md-2 filter-order" status="0">Chờ xác nhận</div>
                    <div class="col-md-2 filter-order" status="1">Chờ lấy hàng</div>
                    <div class="col-md-2 filter-order" status="2">Đang giao</div>
                    <div class="col-md-2 filter-order" status="3">Đã giao</div>
                    <div class="col-md-2 filter-order" status="4">Đã hủy</div>
                    <div class="col-md-12" id="filter-order">
                        <?php
                        foreach ($result as $item) {
                            $sql = 'select *from order_details inner join orders INNER join product 
                            where orders.id = order_details.order_id and order_details.product_id = product.id and order_id = "' . $item['id'] . '"';
                            $data = executeResult($sql);
                            echo '
                                <div class="row order__details-items">
                                    <div class="col-md-12 d-flex justify-content-end py-3" style ="color: #c30005; font-weight: 400; font-size: 0.875rem">
                                    ' . ($item['status'] == 0 ? "CHỜ XÁC NHẬN" : ($item['status'] == 1 ? "CHỜ LẤY HÀNG" : ($item['status'] == 2 ? "ĐANG GIAO" : ($item['status'] == 3 ? "ĐÃ GIAO" : "ĐÃ HỦY")))) . '
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
                                                    <del>' . number_format($item['price'], 0, ',', ',') . 'đ</del>
                                                    ' . number_format($item['discount'], 0, ',', ',') . 'đ
                                                    </div>
                                            </div>
                                        ';
                            }

                            ?>
                        <?php
                            echo '
                                    <div class="col-md-12 d-flex justify-content-between py-3">
                                        <div style ="color: rgba(0, 0, 0, 0.54);"><strong>Địa chỉ:</strong> ' . $item['address'] . '</div>
                                        <div class="d-flex justify-content-start">
                                        <div class="me-2">
                                        <svg width="16" height="17" viewBox="0 0 253 263" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M126.5 0.389801C126.5 0.389801 82.61 27.8998 5.75 26.8598C5.08763 26.8507 4.43006 26.9733 3.81548 27.2205C3.20091 27.4677 2.64159 27.8346 2.17 28.2998C1.69998 28.7657 1.32713 29.3203 1.07307 29.9314C0.819019 30.5425 0.688805 31.198 0.689995 31.8598V106.97C0.687073 131.07 6.77532 154.78 18.3892 175.898C30.003 197.015 46.7657 214.855 67.12 227.76L118.47 260.28C120.872 261.802 123.657 262.61 126.5 262.61C129.343 262.61 132.128 261.802 134.53 260.28L185.88 227.73C206.234 214.825 222.997 196.985 234.611 175.868C246.225 154.75 252.313 131.04 252.31 106.94V31.8598C252.31 31.1973 252.178 30.5414 251.922 29.9303C251.667 29.3191 251.292 28.7649 250.82 28.2998C250.35 27.8358 249.792 27.4696 249.179 27.2225C248.566 26.9753 247.911 26.852 247.25 26.8598C170.39 27.8998 126.5 0.389801 126.5 0.389801Z" fill="#ee4d2d"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M207.7 149.66L119.61 107.03C116.386 105.472 113.914 102.697 112.736 99.3154C111.558 95.9342 111.772 92.2235 113.33 88.9998C114.888 85.7761 117.663 83.3034 121.044 82.1257C124.426 80.948 128.136 81.1617 131.36 82.7198L215.43 123.38C215.7 120.38 215.85 117.38 215.85 114.31V61.0298C215.848 60.5592 215.753 60.0936 215.57 59.6598C215.393 59.2232 215.128 58.8281 214.79 58.4998C214.457 58.1705 214.063 57.909 213.63 57.7298C213.194 57.5576 212.729 57.4727 212.26 57.4798C157.69 58.2298 126.5 38.6798 126.5 38.6798C126.5 38.6798 95.31 58.2298 40.71 57.4798C40.2401 57.4732 39.7735 57.5602 39.3376 57.7357C38.9017 57.9113 38.5051 58.1719 38.1709 58.5023C37.8367 58.8328 37.5717 59.2264 37.3913 59.6604C37.2108 60.0943 37.1186 60.5599 37.12 61.0298V108.03L118.84 147.57C121.591 148.902 123.808 151.128 125.129 153.884C126.45 156.64 126.797 159.762 126.113 162.741C125.429 165.72 123.755 168.378 121.363 170.282C118.972 172.185 116.006 173.221 112.95 173.22C110.919 173.221 108.915 172.76 107.09 171.87L40.24 139.48C46.6407 164.573 62.3785 186.277 84.24 200.16L124.49 225.7C125.061 226.053 125.719 226.24 126.39 226.24C127.061 226.24 127.719 226.053 128.29 225.7L168.57 200.16C187.187 188.399 201.464 170.892 209.24 150.29C208.715 150.11 208.2 149.9 207.7 149.66Z" fill="#fff"></path></svg>
                                        </div>
                                        <div>
                                        Tổng số tiền: <span style ="color: #c30005;">' . number_format($item['total_money'], 0, ',', ',') . 'đ</span>
                                        </div></div>
                                    </div>
                                    <div class = "col-md-12 d-flex justify-content-end">
                                    ' . ($item['status'] == 0 ? "<div class ='action-cancel me-3' onclick = 'cancelOrder(" . $item['order_id'] . ")'>Hủy Đơn</div>" : ($item['status'] == 1 ? "<div class ='action-cancel me-3' onclick = 'cancelOrder(" . $item['order_id'] . ")'>Hủy Đơn</div>" :
                                     ($item['status'] == 2 ? "<div class ='action-confirm' onclick = 'confirmOrder(" . $item['order_id'] . ")'>Xác Nhận Nhận Hàng</div>" :
                                      ($item['status'] == 3 ? "<a href = 'product_details.php?id=" . $item['id'] . "'' class ='action-rebuy me-3'>Mua Lại</a>" :
                                            "<a href = 'product_details.php?id=" . $item['id'] . "'' class ='action-rebuy me-3'>Mua Lại</a>")))) . '
                                    </div>
                                </div>
                                ';
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<?php
require_once('layouts/footer.php');
?>
<script>
    $('.filter-order').on('click', (e) => {
        $('.filter-order--active')[0].classList.remove('filter-order--active')
        e.target.classList.add('filter-order--active')
    })

    function cancelOrder(id) {
        $.post('api/order.php', {
            "action": "cancelOrder",
            "order_id": id
        }, function(data) {
            location.reload()
        })
    }

    function confirmOrder(id) {
        $.post('api/order.php', {
            "action": "confirmOrder",
            "order_id": id
        }, function(data) {
            location.reload()
        })
    }

    let filterElement = document.querySelectorAll('.filter-order')
    filterElement.forEach((e, index) => {
        e.addEventListener('click', () => {
            $.post('api/order.php', {
                "action": "filterOrder",
                "status": e.getAttribute('status')
            }, function(data) {
                $('#filter-order').html(data)
            })
        })
    })
</script>