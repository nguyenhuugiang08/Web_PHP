<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');

if (!empty($_POST)) {
    $valueRangeMin = getPOST('valueRangeMin');
    $valueRangeMax = getPOST('valueRangeMax');
    $type = getPOST('type');
}

$sql = "select count(id) as count from product where category_id = $type and price >= $valueRangeMin and price <= $valueRangeMax and deleted = 0";
$count = executeResultOne($sql);

$pages = ceil((int)$count['count'] / 12);
?>
<ul class="pagination">
    <li class="page-item">
        <a class="page-link me-1" onclick="prevFilterPage()" aria-label="Previous">
            <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
        </a>
    </li>
    <?php
    for ($i = 1; $i <= $pages; $i++) {
        echo '
            <li class="page-item"><a class="page-link me-1 page-link-' . $i . ' '.($i ==1 ? "active-link" : "").'" onclick = "currentFilterPage(' . $i . ')">' . $i . '</a></li>
        ';
    }
    ?>
    <li class="page-item">
        <a class="page-link" onclick="nextFilterPage()" aria-label="Next">
            <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
        </a>
    </li>
</ul>

<script>
    // prev page
    function prevFilterPage() {
       let prevFilterPage = $('.active-link')[0].innerText - 1
       prevFilterPage != 0 && currentPage(prevFilterPage)
    }
    // next page
    function nextFilterPage() {
       let nextFilterPage = Number($('.active-link')[0].innerText) + 1
       nextFilterPage <= $('.page-link').length - 2 && currentPage(nextFilterPage)
    }
</script>