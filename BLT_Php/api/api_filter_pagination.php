<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');

if (!empty($_POST)) {
    $valueRangeMin = getPOST('valueRangeMin');
    $valueRangeMax = getPOST('valueRangeMax');
}

$sql = "select count(id) as count from product where category_id = 2 and price >= $valueRangeMin and price <= $valueRangeMax";
$count = executeResultOne($sql);

$pages = ceil((int)$count['count'] / 12);
?>
<ul class="pagination">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <?php
    for ($i = 1; $i <= $pages; $i++) {
        echo '
            <li class="page-item"><a class="page-link" onclick = "currentFilterPage(' . $i . ')">' . $i . '</a></li>
        ';
    }
    ?>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>