<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');
$sql = "SELECT * FROM orders  limit 7";
$userList = executeResult($sql);

require_once('../layout/admin_header.php');
?>

<div class="category">
    Danh sách hóa đơn
</div>

<div class="product-process">
    <div class="cate-products">
        <table class="table table-hover align-items-center table-bordered js-copytextarea mt-5" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Xác nhận</th>
                    <th scope="col">Giao hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach ($userList as $item) {
                    echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $item['fullname'] . '</td>
                            <td>' . $item['email']  . '</td>
                            <td>' . $item['phone_number'] . '</td>
                            <td>' . $item['address'] . '</td>
                            <td>' . $item['note'] . '</td>
                            <td>' . $item['order_date'] . '</td>
                            <td>' . ($item['status'] == 0 ? "chờ xác nhận" : ($item['status'] == 1 ? "chờ lấy hàng" : ($item['status'] == 2 ? "đang giao" : ($item['status'] == 3 ? "đã giao" : "đã hủy")))) . '</td>
                            <td>' . $item['total_money'] . '</td>
                            <td>
                                <a href = "detail_order.php?id= ' . $item['id'] . '" style = "text-decoration: none;">
                                    <button class="btn btn-warning d-flex btn-action">
                                        Detail
                                    </button>
                                </a>
                            </td>
                            
                            <td>
                            <button class="btn btn-success d-flex btn-action" ' . ($item['status'] == 0 ? "" : "disabled") . '
                                onclick = "confirmStatus(' . $item['id'] . ')"
                            >
                                    ' . ($item['status'] == 0 ? "Confirm" : "Confirmed") . '
                            </button>
                           
                        </td>
                        <td>
                        <button class="btn btn-info d-flex btn-action" ' . ($item['status'] != 1 ? "disabled" : "") . '
                            onclick = "updateStatus(' . $item['id'] . ')"
                        >
                                ' . ($item['status'] == 1 ? "transport" :
                                 ($item['status'] == 2 ? "transporting" :
                                  ($item['status'] == 3 ? "transported" :"transport"))) . '
                        </button>
                    </td>
                        </tr>
                        ';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<script>

    function confirmStatus(id) {

        $.post('../api/index.php', {
                'action': 'confirmStatus',
                'id': id
            },
            function(data) {
                location.reload()
            })

    }

    function updateStatus(id) {
        $.post('../api/index.php', {
                'action': 'updateStatus',
                'id': id
            },
            function(data) {
                location.reload()
            })
    }
</script>
</body>

</html>