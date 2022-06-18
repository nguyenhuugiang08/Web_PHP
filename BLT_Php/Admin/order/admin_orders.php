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
    <a href="add_user.php">
        <button class="btn btn-success"> <i class="fa-solid fa-plus"></i> Tạo hóa đơn</button>
    </a>
    <div class="cate-products">
        <table class="table table-hover align-items-center table-bordered js-copytextarea mt-5" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
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
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                            <td>' . $item['status'] . '</td>
                            <td>' . $item['total_money'] . '</td>
                            <td>
                                <a href = "edit_user.php?id= '.$item['id'].'" style = "text-decoration: none;">
                                    <button class="btn btn-warning d-flex btn-action">
                                        <i class="fa-solid fa-pen-to-square table-icon"></i>
                                        Edit
                                    </button>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-danger d-flex btn-action" onClick="deleteOrder(' . $item['id'] . ')">
                                    <i class="fa-solid fa-trash table-icon"></i>
                                    Delete
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
    function deleteOrder(id) {
        var option = confirm('Bạn có chắc chắn muốn xóa người dùng này ? ')

        if (!option) {
            return;
        }
        $.post('../api/index.php', {
                'action': 'deleteUser',
                'id': id
            },
            function(data) {
                location.reload()
            })
    }
</script>
</body>

</html> 