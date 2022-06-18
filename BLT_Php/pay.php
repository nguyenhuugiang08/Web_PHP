<?php
require_once('layouts/header.php');
session_start();
?>

<style>
    <?php
    require_once('css/base.css');
    require_once('css/pay.css');
    ?>
</style>
<div class="container pay-main">
    <div class="row mb-5">
        <div class="col-md-7 py-4 px-5">
            <div class="col-md-12 mb-4 fw-bold" style="font-size: 1.1em;">THÔNG TIN THANH TOÁN</div>
            <form class="row g-3" method="post">
                <div class="col-md-12">
                    <label for="name" class="form-label mb-3"><strong>Họ tên*</strong></label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label mb-3"><strong>Tỉnh/ Thành phố</strong></label>
                    <select name="calc_shipping_provinces" class="form-select" required="">
                        <option value="">Tỉnh / Thành phố</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label mb-3"><strong>Quận / Huyện</strong></label>
                    <select name="calc_shipping_district" class="form-select" required="">
                        <option value="">Quận / Huyện</option>
                    </select>
                </div>
                <input class="billing_address_1" name="" type="hidden" value="">
                <input class="billing_address_2" name="" type="hidden" value="">
                <div class="col-md-12">
                    <label for="address" class="form-label mb-3"><strong>Địa chỉ</strong></label>
                    <input type="text" class="form-control" id="address">
                </div>
                <div class="col-12">
                    <label for="phone_number" class="form-label mb-3"><strong>Số điện thoại</strong></label>
                    <input type="text" class="form-control" id="phone_number">
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label mb-3"><strong>Email</strong></label>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="form-floating">
                    <div class="mb-3"><strong>Ghi chú đơn hàng (tuỳ chọn)</strong></div>
                    <textarea class="form-control" id="description" style="height: 100px"></textarea>
                </div>
            </form>
        </div>
        <div class="col-md-5 order-information">
            <div class="col-md-12 order-information__title">ĐƠN HÀNG CỦA BẠN</div>
            <div class="d-flex mt-4 justify-content-between align-items-center border-bottom border-3 pb-2">
                <div>SẢN PHẨM</div>
                <div>TỔNG</div>
            </div>
            <div>
                <?php
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        echo '
                            <div class="d-flex mt-4 border-bottom pb-2 justify-content-between align-items-center">
                                <div>' . $item['title'] . ' <strong>x' . $item['num'] . '</strong></div>
                                <div><strong>' . number_format((int)$item['num'] * (float)$item['price'], 0, ',', ',') . '<ins><ins>đ</ins></ins></strong></div>
                            </div>
                            ';
                    }
                }
                ?>
            </div>
            <div class="d-flex mt-4 border-bottom pb-2 justify-content-between align-items-center">
                <div>Tổng phụ</div>
                <div>
                    <?php
                    $sum = 0;
                    if (isset(($_SESSION['cart']))) {
                        foreach ($_SESSION['cart'] as $item) {
                            $sum += (int)$item['num'] * (float)$item['price'];
                        }
                    }
                    echo '<strong>' . number_format($sum, 0, ',', ',') . '<ins><ins>đ</ins></ins></strong>';
                    ?>
                </div>
            </div>
            <div class="d-flex mt-4 border-bottom pb-2 justify-content-between align-items-center">
                <div>Giao hàng</div>
                <div>Giao hàng miễn phí</div>
            </div>
            <div class="d-flex mt-4 border-bottom border-3 pb-2 justify-content-between align-items-center">
                <strong>Tổng</strong>
                <div>
                    <?php
                    $sum = 0;
                    if (isset(($_SESSION['cart']))) {
                        foreach ($_SESSION['cart'] as $item) {
                            $sum += (int)$item['num'] * (float)$item['price'];
                        }
                    }
                    echo '<strong>' . number_format($sum, 0, ',', ',') . '<ins><ins>đ</ins></ins></strong>';
                    ?>
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <div>
                        <input type="radio" name="tienmat" id="tienmat" checked>
                        <strong>Trả tiền mặt khi nhận hàng</strong>
                    </div>
                    <div class=" money">
                        Trả tiền mặt khi giao hàng
                    </div>
                </div>
                <div class=" my-3 border-top py-2">
                    <div>
                        <input type="radio" name="chuyenkhoan" id="chuyenkhoan">
                        <strong>Chuyển khoản ngân hàng</strong>
                    </div>
                    <div class=" nomoney" style="display: none;">
                        Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.
                    </div>
                </div>
            </div>
            <a class="btn-order mt-5" <?= $_SESSION['login'] == "Successfully" ? "onclick='addOrder(" . $_SESSION['userId'] . ")'" : "href='user/index.php'" ?>>ĐẶT HÀNG</a>
        </div>
    </div>
</div>
<?php
require_once('layouts/footer.php');
?>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
<script>
    $('#tienmat').on('click input', (e) => {
        $('#tienmat')[0].checked = true;
        $('#chuyenkhoan')[0].checked = false;

        Object.assign($('.money')[0].style, {
            "display": "block",
            "transition": "all linear 0.5s"
        })
        $('.nomoney')[0].style.display = "none"
    })

    $('#chuyenkhoan').on('click input', (e) => {
        $('#chuyenkhoan')[0].checked = true;
        $('#tienmat')[0].checked = false;

        Object.assign($('.nomoney')[0].style, {
            "display": "block",
            "transition": "all linear 0.5s"
        })
        $('.money')[0].style.display = "none"
    })

    if (address_2 = localStorage.getItem('address_2_saved')) {
        $('select[name="calc_shipping_district"] option').each(function() {
            if ($(this).text() == address_2) {
                $(this).attr('selected', '')
            }
        })
        $('input.billing_address_2').attr('value', address_2)
    }
    if (district = localStorage.getItem('district')) {
        $('select[name="calc_shipping_district"]').html(district)
        $('select[name="calc_shipping_district"]').on('change', function() {
            var target = $(this).children('option:selected')
            target.attr('selected', '')
            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
            address_2 = target.text()
            $('input.billing_address_2').attr('value', address_2)
            district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('district', district)
            localStorage.setItem('address_2_saved', address_2)
        })
    }
    $('select[name="calc_shipping_provinces"]').each(function() {
        var $this = $(this),
            stc = ''
        c.forEach(function(i, e) {
            e += +1
            stc += '<option value=' + e + '>' + i + '</option>'
            $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
            if (address_1 = localStorage.getItem('address_1_saved')) {
                $('select[name="calc_shipping_provinces"] option').each(function() {
                    if ($(this).text() == address_1) {
                        $(this).attr('selected', '')
                    }
                })
                $('input.billing_address_1').attr('value', address_1)
            }
            $this.on('change', function(i) {
                i = $this.children('option:selected').index() - 1
                var str = '',
                    r = $this.val()
                if (r != '') {
                    arr[i].forEach(function(el) {
                        str += '<option value="' + el + '">' + el + '</option>'
                        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                    })
                    var address_1 = $this.children('option:selected').text()
                    var district = $('select[name="calc_shipping_district"]').html()
                    localStorage.setItem('address_1_saved', address_1)
                    localStorage.setItem('district', district)
                    $('select[name="calc_shipping_district"]').on('change', function() {
                        var target = $(this).children('option:selected')
                        target.attr('selected', '')
                        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                        var address_2 = target.text()
                        $('input.billing_address_2').attr('value', address_2)
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.setItem('address_2_saved', address_2)
                    })
                } else {
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                    district = $('select[name="calc_shipping_district"]').html()
                    localStorage.setItem('district', district)
                    localStorage.removeItem('address_1_saved', address_1)
                }
            })
        })
    })

    function addOrder(id) {
    if($('#name')[0].value !== '' && $('#address')[0].value !== '' && $('#phone_number')[0].value !== '' && $('#email')[0].value !== ''){
            $.post('api/order.php', {
                "action": "addOrder",
                "user_id": id,
                "name": $('#name')[0].value,
                "address": $('#address')[0].value,
                "phone_number": $('#phone_number')[0].value,
                "email": $('#email')[0].value,
                "description": $('#description')[0].value,
            }, function(data) {
                location.reload()
                alert(data)
            })
        }else alert('Bạn cần nhập đầy đủ thông tin.')
    }

</script>