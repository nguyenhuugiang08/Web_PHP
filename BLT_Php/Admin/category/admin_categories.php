<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

$query = "select count(id) as countCate from category";
$countCate = executeResultOne($query);
$pages = ceil(((int)$countCate['countCate']) / 6);
$index = 0;
if (!empty($_GET)) {
    $index = ((int)(getGET('page')) - 1) * 6;
}

$sql = "SELECT * FROM category limit $index,6";
$listProduct = executeResult($sql);

include_once('../layout/admin_header.php');

?>
<div class="category">
    Danh sách danh mục sản phẩm
</div>

<div class="product-process">
    <a href="add_category.php">
        <button class="btn btn-success"> <i class="fa-solid fa-plus"></i> Tạo danh mục mới</button>
    </a>
    <div>
        <table class="table table-hover table-bordered js-copytextarea mt-5" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Xóa</th>
                    <th scope="col">Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach ($listProduct as $item) {
                    echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $item['name'] . '</td>
                            <td>' . $item['created_at'] . '</td>
                            <td>' . $item['updated_at'] . '</td>
                            <td>
                               <a href = "edit_category.php?id='.$item['id'].'" style = "text-decoration: none;">
                                    <button class="btn btn-warning d-flex btn-action">
                                        <i class="fa-solid fa-pen-to-square table-icon"></i>
                                        Edit
                                    </button>
                               </a>
                            </td>
                            <td>
                                <button class="btn btn-danger d-flex btn-action" onClick="deleteCategory(' . $item['id'] . ')">
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
    <div class="row">
        <div>
            Hiển thị 6 danh mục
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                    echo '
                        <li class="page-item"><a class="page-link" href="?page= ' . $i . '">' . $i . '</a></li>
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
    function deleteCategory(id) {
        var option = confirm('Bạn có chắc chắn muốn xóa sản phẩm này ? ')

        if (!option) {
            return;
        }
        $.post('../api/index.php', {
                'action': 'deleteCategory',
                'id': id
            },
            function(data) {
                location.reload()
            })
    }
</script>
</body>

</html>