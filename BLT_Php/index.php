<?php
include_once('layouts/header.php');
?>
<style>
    <?php
    include_once('css/base.css');
    ?>
</style>
<div class="content">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-inner">
                        <div data-bs-interval="5000" class="carousel-item active">
                            <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/slide-1.jpg" style="width:1200px; height:500px;" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>MONA SNE <i class="fa-regular fa-star"></i> KER</h1>
                                <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh. </p>
                            </div>
                        </div>
                        <div data-bs-interval="5000" class="carousel-item" style=" overflow: hiden;">
                            <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/slide-2.jpg" style="width:1200px; height:500px;" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div data-bs-interval="5000" class="carousel-item" style=" overflow: hiden;">
                            <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/slide-5.jpg" style="width:1200px; height:500px;" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="banner-fill">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/title_block_03.png" class="banner-img" alt="">
                    <div>
                        <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/product_block_03.jpg" alt="">
                    </div>
                    <a href="../BLT_Php/man_products.php">
                        <div class="show-product">
                            Xem sản phẩm
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-fill">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/title_block_05.png" class="banner-img" alt="">
                    <div>
                        <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/product_block_05.jpg" alt="">
                    </div>
                    <a href="../BLT_Php/women_products.php">
                        <div class="show-product">
                            Xem sản phẩm
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-fill">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/title_block_07.png" class="banner-img" alt="">
                    <div>
                        <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/product_block_07.jpg" alt="">
                    </div>
                    <a href="../BLT_Php/children_products.php">
                        <div class="show-product">
                            Xem sản phẩm
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="title-product">
                PHỤ KIỆN KHÁC
            </div>
            <?php
            $sql = "select *from product where category_id = 3 and deleted = 0 limit 8";
            $productList = executeResult($sql);
            foreach ($productList as $item) {
                echo '
                        <div class="col-md-3 card-product">
                                <a href = "product_details.php?id=' . $item['id'] . '">
                                    <img src="images/' . $item['thumbnail'] . '" class="card-img-top" alt="...">
                                </a>
                                <div class="d-flex justify-content-center flex-md-column align-items-center p-4">
                                    <a href = "product_details.php?id=' . $item['id'] . '" class="card-title">' . $item['title'] . '</a>
                                    <div class = "price my-1">' . number_format($item['price'], 0, ',', '.') . 'đ</div>
                                    <a onclick = "addCart('.$item['id'].')" class="add-cart">Thêm vào giỏ</a>
                                </div>
                        </div>          
                        ';
            }
            ?>
            <div class="d-flex justify-content-center">
                <div class="show-all">
                    Xem tất cả
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="banner-promotion">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/banner-1.jpg" class="banner-promotion__img" alt="">
                    <div class="banner-promotion__item">
                        <h5>MONA SNE <i class="fa-regular fa-star"></i> KER</h5>
                        <h1>KHUYẾN MÃI <span style="color: yellow;">GIẢM GIÁ 50%</span></h1>
                        <a class="banner-promotion__all-product">Xem sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="title-product">
                SẢN PHẨM NỮ
            </div>
            <?php
            $sql = "select *from product where category_id = 2 and deleted = 0 limit 8";
            $productList = executeResult($sql);
            foreach ($productList as $item) {
                echo '
                        <div class="col-md-3 card-product">
                                <img src="images/' . $item['thumbnail'] . '" class="card-img-top" alt="...">
                                <div class="d-flex justify-content-center flex-md-column align-items-center p-4">
                                    <a class="card-title">' . $item['title'] . '</a>
                                    <div class = "price my-1">' . number_format($item['price'], 0, ',', '.') . 'đ</div>
                                    <a class="add-cart" onclick = "addCart('.$item['id'].')">Thêm vào giỏ</a>
                                </div>
                        </div>          
                        ';
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once('layouts/footer.php');
?>
</body>


</html>