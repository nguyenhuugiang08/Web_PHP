<div class="up-to-top">
    <i class="fa-solid fa-angle-up"></i>
</div>
<div class="footer">
    <div class="container ">
        <div class="row footer-main">
            <div class="col-md-3">
                <h3 class="footer-heading">GIỚI THIỆU</h3>
                <div class="footer-intro">
                    Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="footer-heading">ĐỊA CHỈ</h3>
                <ul class="address-list">
                    <li class="address-list__item d-flex" style="left: 0; top: 0;">
                        <i class="fa-solid fa-location-dot address-list__icon address-list__icon--active"></i>
                        <div>319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM</div>
                    </li>
                    <li class="address-list__item">
                        <i class="fa-solid fa-phone address-list__icon"></i>
                        <a href="#" class="address-list__link"> 076 922 0162</a>
                    </li>
                    <li class="address-list__item d-flex" style="left: 0; top: 0;">
                        <i class="fa-solid fa-envelope-open-text address-list__icon address-list__icon--active"></i>
                        <div>
                            <a href="#" class="address-list__link"> demonhunterg@gmail.com</a>
                            <a href="#" class="address-list__link"> mon@mona.media</a>
                        </div>

                    </li>
                    <li class="address-list__item">
                        <i class="fa-brands fa-skype address-list__icon"></i>
                        <a href="#" class="address-list__link"> demonhunterp</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="footer-heading">MENU</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="menu-list">
                            <li>
                                <a href="../../BLT_Php/index.php" class="menu-list__link">Trang chủ</a>
                            </li>
                            <li>
                                <a href="" class="menu-list__link">Cửa hàng</a>
                            </li>
                            <li>
                                <a href="" class="menu-list__link">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="menu-list">
                            <li>
                                <a href="" class="menu-list__link">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="" class="menu-list__link">Tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="footer-heading">MẠNG XÃ HỘI</h3>
                <div class="social-list d-flex">
                    <a href="#" class="social-link facebook">
                        <div class="social-item">
                            <i class="fa-brands fa-facebook-f"></i>
                        </div>
                    </a>
                    <a href="#" class="social-link instagram">
                        <div class="social-item">
                            <i class="fa-brands fa-instagram social-icon"></i>
                        </div>
                    </a>
                    <a href="#" class="social-link twitter">
                        <div class="social-item">
                            <i class="fa-brands fa-twitter social-icon"></i>
                        </div>
                    </a>
                    <a href="#" class="social-link printerest">
                        <div class="social-item">
                            <i class="fa-brands fa-pinterest social-icon"></i>
                        </div>
                    </a>
                    <a href="#" class="social-link rss">
                        <div class="social-item">
                            <i class="fa-solid fa-rss social-icon"></i>
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h3 class="footer-bottom__title">ĐĂNG KÝ NHẬN THÔNG TIN</h3>
            </div>
            <div class="col-md-4 d-flex">
                <input type="email" placeholder="Email..." class="footer-bottom__input">
                <button class="btn-register">ĐĂNG KÝ</button>
            </div>
            <div class="col-md-5 d-flex justify-content-center">
                <div class="mb-5">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/payment1.png" alt="">
                </div>
                <div class="mb-5">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/payment2.png" alt="">
                </div>
                <div class="mb-5">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/payment3.png" alt="">
                </div>
                <div class="mb-5">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/payment4.png" alt="">
                </div>
                <div class="mb-5">
                    <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/payment5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    upToTopElement = document.querySelector('.up-to-top')

    document.onscroll = () => {
        if (document.documentElement.scrollTop >= 800) {
            upToTopElement.style.display = "flex"
        } else {
            upToTopElement.style.display = "none"
        }
    }
    upToTopElement.onclick = () => {
        document.documentElement.scrollTop = 0
    }

    $('.header-account').on('mouseover', () => {
        $('.cart-show__info')[0].style.display = "block"
    })

    $('.header-account').on('mouseout', () => {
        $('.cart-show__info')[0].style.display = "none"
    })

    function addCart(id) {
        // $('.cart-show__info')[0].style.display = "block"

        // setTimeout(() => {
        //     $('.cart-show__info')[0].style.display = "none"
        // }, 5000);

        $.post('api/cart.php', {
            "action": "addCart",
            "proId":id,
            "num":1
        }, function(data){
            $('.cart-show__info').html(data)
            location.reload()
        })
    }
    function deleteProductCart(id) {
        $.post('api/cart.php', {
            "action":"deleteCart",
            "deleteId":id
        }, function(data){
            $('.cart-show__info').html(data)
            location.reload()
        })
    }

   
    
</script>