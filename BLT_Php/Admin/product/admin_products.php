<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$query = 'select *from products LIMIT 7';
$listProduct = executeResult($query);

include_once('../layout/admin_header.php');

?>
<div class="category">
    Danh sách sản phẩm
</div>

<div class="product-process">
    <a href="add_product.php">
        <button class="btn btn-success"> <i class="fa-solid fa-plus"></i> Tạo sản phẩm mới</button>
    </a>
    <div>
    <table class="table table-hover table-bordered js-copytextarea mt-5" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
              <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">type of product</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date create</th>
                    <th scope="col">Date update</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
              <tbody>
              <?php
                $index = 1;
                foreach ($listProduct as $item) {
                    $type = '';
                    $item['cate_id'] == 1 ? $type = "Nam" : ($item['cate_id'] == 2 ? $type = "Nữ" : $type = "Sản phẩm khác");
                    echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $item['title'] . '</td>
                            <td>' . number_format($item['price'], 0, ',', '.') . '</td>
                            <td>' . $type . '</td>
                            <td>' . $item['descripton'] . '</td>
                            <td>' . $item['create_at'] . '</td>
                            <td>' . $item['update_at'] . '</td>
                            <td>
                                <button class="btn btn-danger d-flex btn-action" onClick="deleteProduct(' . $item['id'] . ')">
                                    <i class="fa-solid fa-trash table-icon"></i>
                                    Delete
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-warning d-flex btn-action">
                                    <i class="fa-solid fa-pen-to-square table-icon"></i>
                                    Edit
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
    function deleteProduct(id) {
        var option = confirm('Bạn có chắc chắn muốn xóa sản phẩm này ? ')

        if (!option) {
            return;
        }
        $.post('../api/index.php', {
                'action': 'deleteProduct',
                'id': id
            },
            function(data) {
                location.reload()
            })
    }
</script>
</body>

</html>