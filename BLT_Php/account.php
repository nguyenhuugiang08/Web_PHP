<?php
include_once('layouts/header.php');
?>
<style>
    <?php
    require_once('css/base.css');
    require_once('css/order_details.css');
    ?>
</style>
<div class="wrapper-order__details">
    <div class="container order-details-main">
        <div class="row">
            <div class="col-md-3">
                <a class="header-avatar order-avatar">
                    <img src="https://i.pravatar.cc/150?img=<?= $_SESSION['userId'] ?>" alt="Avatar" class="header-avatar__img">
                    <div class="header-avatar__username"><?= $userName['username'] ?></div>
                </a>
                <ul class="account-detail">
                    <li class="account-detail__item"><i class="fa-solid fa-user"></i>Tài khoản của tôi
                        <ul>
                            <li>Đổi mật khẩu</li>
                        </ul>
                    </li>
                    <li class="account-detail__item"><i class="fa-solid fa-clipboard-list me-3"></i>Đơn mua</li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="Hvae38" role="main">
                    <div class="GDF4Dt">
                        <div class="aBgnwW">
                            <h1 class="QvBZmg">Hồ sơ của tôi</h1>
                            <div class="ItV+hT">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                        </div>
                        <div class="xbLgBv">
                            <div class="cfTCNE">
                                <form>
                                    <div class="es8DWX">
                                        <div class="_5eQ8vX">
                                            <div class="_3cfiVM"><label>Tên đăng nhập</label></div>
                                            <div class="v1Bl9+">
                                                <div class="_2MJTPE">
                                                    <div class="J7g-AJ">nguyenhuugiangaa</div><button class="OcJZJm"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="es8DWX">
                                        <div class="_5eQ8vX">
                                            <div class="_3cfiVM"><label>Tên</label></div>
                                            <div class="v1Bl9+">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text" placeholder="" maxlength="255" value=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="es8DWX">
                                        <div class="_5eQ8vX">
                                            <div class="_3cfiVM"><label>Email</label></div>
                                            <div class="v1Bl9+">
                                                <div class="_2MJTPE">
                                                    <div class="J7g-AJ">ng*************@gmail.com</div><button class="OcJZJm">Thay đổi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="es8DWX">
                                        <div class="_5eQ8vX">
                                            <div class="_3cfiVM"><label>Số điện thoại</label></div>
                                            <div class="v1Bl9+">
                                                <div class="_2MJTPE">
                                                    <div class="J7g-AJ">*********93</div><button class="OcJZJm">Thay đổi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php
include_once('layouts/footer.php');
?>
</body>

</html>