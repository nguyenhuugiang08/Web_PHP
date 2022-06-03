<?php
require_once('database/dbhelper.php');
require_once('layouts/header.php');
require_once('utils/utility.php');

$sql = "select *from product where category_id = 2 limit 7";
$listProduct = executeResult($sql);

$sql = "select count(id) as countId from product where category_id = 2 ";
$countId = executeResultOne($sql);

$pages = ceil((int)$countId['countId'] / 12);

?>
<style>
    <?php
    require_once('css/base.css');
    require_once('css/products.css');
    ?>
</style>
<div class="container women-main">
    <div class="row heading">
        <div class="col-md-6 heading-left">
            <a href="index.php">TRANG CHỦ</a>/
            <a href="/">NỮ</a>
        </div>
        <div class="col-md-6 heading-right">
            <div>Hiển thị </div>
            <div class="ms-1"> trong</div>
            <div class="ms-1"><?= $countId['countId'] ?></div>
            <div class="ms-1"> kết quả</div>
            <div>
                <select class="form-select ms-4" id="form-select" aria-label="Default select example">
                    <option selected value="0">Thứ tự mặc định</option>
                    <option value="1">Mới nhất</option>
                    <option value="2">Thứ tự theo giá: thấp đến cao</option>
                    <option value="3">Thứ tự theo giá: cao xuống thấp</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3">
            <h5>LỌC THEO GIÁ</h5>
            <div class="range-slide">
                <div class="slide">
                    <div class="line" id="line" style="left: 0%; right: 0%;"></div>
                    <span class="thumb" id="thumbMin" style="left: 0%;"></span>
                    <span class="thumb" id="thumbMax" style="left: 100%;"></span>
                </div>
                <input class="input-range" id="rangeMin" type="range" max="100" min="0" step="5" value="0">
                <input class="input-range" id="rangeMax" type="range" max="100" min="0" step="5" value="100">
            </div>
            <div class="d-flex justify-content-center align-items-center mb-5">
                <div class="filter" onclick="filterPrice()">LỌC</div>
                <div class="display">
                    <span class="display-title">Giá: </span>
                    <span id="min" class="mx-2">1,120,000đ</span>
                    <span>-</span>
                    <span id="max" class="ms-2">2,800,000đ</span>
                </div>
            </div>
            <div class="demo-product">
                <h5>SẢN PHẨM</h5>
                <div class="demo-product__wapper mb-5 mt-4">
                    <?php
                    foreach ($listProduct as $item) {
                        echo '
                            <ul class="demo-product__list">
                                <li class="demo-product__item">
                                    <a href = "product_details.php?id=' . $item['id'] . '" class="demo-product__link">
                                        <img src="images/' . $item['thumbnail'] . '" class = "demo-product__img me-4" alt="">
                                        <div>
                                            <div class ="demo-product__title">' . $item['title'] . '</div>
                                            <div>' . number_format($item['price'], 0, ',', ',') . 'đ</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row" id="wapper-products">
                <?php
                $sql = "select *from product where category_id = 2 limit 12 ";
                $productList = executeResult($sql);
                foreach ($productList as $item) {
                    echo '
                        <div class="col-md-3 card-product ">
                                <div class="women-product__detail">
                                    <a href = "product_details.php?id=' . $item['id'] . '">
                                        <img src="images/' . $item['thumbnail'] . '" class="card-img-top" alt="...">
                                     </a>
                                    <div class="d-flex justify-content-center flex-md-column align-items-center p-4">
                                        <a href = "product_details.php?id=' . $item['id'] . '" class="card-title">' . $item['title'] . '</a>
                                        <div class = "price my-1">' . number_format($item['price'], 0, ',', '.') . 'đ</div>
                                        <a href="#" class="add-cart">Thêm vào giỏ</a>
                                    </div>
                                </div>
                        </div>          
                        ';
                }
                ?>
            </div>
            <nav id="pagination" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" onclick="prevPage()" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '
                            <li class="page-item"><a class="page-link" onclick = "currentPage('.$i.')">' . $i . '</a></li>
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
<?php
require_once('layouts/footer.php');
?>

<script>
    let min = 0;
    let max = 100;

    const calcLeftPosition = value => 100 / (100 - 0) * (value - 0);

    $('#rangeMin').on('input', function(e) {
        const newValue = parseInt(e.target.value);
        if (newValue > max) return;
        min = newValue;
        $('#thumbMin').css('left', calcLeftPosition(newValue) + '%');
        $('#min').html((newValue * 16800 + 1120000).toLocaleString('en-US') + "đ");
        $('#line').css({
            'left': calcLeftPosition(newValue) + '%',
            'right': (100 - calcLeftPosition(max)) + '%'
        });
    });

    $('#rangeMax').on('input', function(e) {
        const newValue = parseInt(e.target.value);
        if (newValue < min) return;
        max = newValue;
        $('#thumbMax').css('left', calcLeftPosition(newValue) + '%');
        $('#max').html((newValue * 16800 + 1120000).toLocaleString('en-US') + "đ");
        $('#line').css({
            'left': calcLeftPosition(min) + '%',
            'right': (100 - calcLeftPosition(newValue)) + '%'
        });
    });

    // post data to filter by value of select tag

    $('#form-select').on(' change select', (e) => {
        let valueSelected = e.target.value;
        $.post('api/api_search.php', {
            "action": "searchProduct",
            "payload": valueSelected
        }, function(data, status) {
            $('#wapper-products').html(data)
        })
    })

    // post current page to paginate pages

    function currentPage(currentPage) {
        $.post('api/api_pagination.php', {
            "action": "currentPage",
            "currentPage": currentPage
        }, function(data, status) {
            $('#wapper-products').html(data)
        })
    }

    // post data to filter by values of input range
    let valueRangeMin = 1120000
    let valueRangeMax = 2800000

    $('#rangeMin').on('change input', (e) => {
         valueRangeMin = e.target.value * 16800 + 1120000 
    });

    $('#rangeMax').on('chane input', (e) => {
         valueRangeMax = e.target.value * 16800 + 1120000
    });

    function filterPrice() {
        $.post('api/api_filter.php', {
            "action": "filter",
            "valueRangeMax": valueRangeMax,
            "valueRangeMin": valueRangeMin
        }, function(data, status) {
            $('#wapper-products').html(data)
        })

        $.post('api/api_filter_pagination.php', {
            "action": "filter",
            "valueRangeMax": valueRangeMax,
            "valueRangeMin": valueRangeMin
        }, function(data, status) {
            $('#pagination').html(data)
        })
    }

    function currentFilterPage(filterPage) {
        $.post('api/api_filter_page.php', {
            "action": "filterPage",
            "valueRangeMax": valueRangeMax,
            "valueRangeMin": valueRangeMin,
            "filterPage": filterPage
        }, function(data, status) {
            $('#wapper-products').html(data)
        })
    }
    // prev page
    function prevPage() {
        
    }
</script>

</html>