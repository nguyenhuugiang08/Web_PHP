<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$query = "select count(id) as countProduct from product";
$countProduct = executeResultOne($query);
$pages = ceil(((int)$countProduct['countProduct'])/6);
$index = 0;
$page = 1;
if(!empty($_GET)){
    $page = getGET('page');
    $index = ((int)$page -1)*6;
}

$sql = "SELECT * FROM product limit $index,6";
$listProduct = executeResult($sql);

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
                    <th scope="col">STT</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giá giảm</th>
                    <th scope="col">Loại</th></th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = ($page -1)*6 + 1;
                foreach ($listProduct as $item) {
                    $cate_id = $item['category_id'];
                    $sql = "select *from category where id = '$cate_id'";
                    $type = executeResultOne($sql);
                    echo '
                        <tr>
                            <th scope="row">' . $count++ . '</th>
                            <td>' . $item['title'] . '</td>
                            <td> <img src="../../images/' . $item['thumbnail'] . '" alt="" style = "width: 80px; height: 80px;"></td>
                            <td>' . number_format($item['price'], 0, ',', '.') . '</td>
                            <td>' . number_format($item['discount'], 0, ',', '.') . '</td>
                            <td>' . $type['name'] . '</td>
                            <td>' . $item['description'] . '</td>
                            <td>' . $item['created_at'] . '</td>
                            <td>' . $item['updated_at'] . '</td>
                            <td>
                                <button class="btn btn-danger d-flex btn-action" onClick="deleteProduct(' . $item['id'] . ')">
                                    <i class="fa-solid fa-trash table-icon"></i>
                                    Delete
                                </button>
                            </td>
                            <td>
                                <a href = "edit_product.php?id= '.$item['id'].'" style = "text-decoration: none;">
                                    <button class="btn btn-warning d-flex btn-action">
                                        <i class="fa-solid fa-pen-to-square table-icon"></i>
                                        Edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                        ';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div>
            Hiển thị 7 sản phẩm
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    for($i=1; $i <= $pages; $i++){
                        echo '
                        <li class="page-item"><a class="page-link" href="?page= '.$i.'">'.$i.'</a></li>
                        ';
                    }
                ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
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