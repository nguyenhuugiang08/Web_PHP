<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
require_once('handle_login.php');
?>
<style>
    <?php
    require_once('../css/style.css');
    ?>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Login Form</title>
</head>

<body>
    <div class="overlay ">
        <a class="overlay-return__home" href="../index.php">
            <i class="fa-solid fa-house-chimney-crack"></i> Trang chủ
        </a>
        <div class="login-form d-flex">
            <div class="login-form__bg">
                <img src="../images/team.jpg" alt="" class="login-form__img">
            </div>
            <div>
                <div class="heading">
                    <h2>Đăng Nhập</h2>
                    <a href="register_form.php" class="register__link">Đăng ký</a>
                </div>
                <form class="row g-3" method="post">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= empty($error['email']) ? "" : 'is-invalid' ?> " id="email" name="email" value="<?= empty($error['email']) && isset($_COOKIE['remember']) && $_COOKIE['remember'] == "checked" ?
                                                                                                                                                        (isset($_COOKIE['email']) ? $_COOKIE['email'] : "$email") : "$email" ?>">
                        <div class="invalid-feedback">
                            <?= empty($error['email']) ? "" : $error['email'] ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-group">
                            <input type="password" class="form-control <?= empty($error['password']) ? "" : 'is-invalid' ?>" id="password" name="password" value="<?= empty($error['password']) && isset($_COOKIE['remember']) && $_COOKIE['remember'] == "checked" ?
                                                                                                                                                                        (isset($_COOKIE['password']) ? $_COOKIE['password'] : "") : "" ?>">
                            <i class="fa-solid fa-eye-slash hiden-password"></i>
                            <i class="fa-solid fa-eye display-password"></i>
                            <div class="invalid-feedback">
                                <?= empty($error['password']) ? "" : $error['password']?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" value="checked" class="remember" name="checkbox_remember" <?= isset($_COOKIE['remember']) ? $_COOKIE['remember'] : "" ?>>
                        <label for="invalidCheck">
                            Remember me
                        </label>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary " type="submit">Đăng Nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // display & hiden password
        let pwdElement = document.querySelector('#password')
        let pwdDisplayElement = document.querySelector('.display-password')
        let pwdHidenElement = document.querySelector('.hiden-password')

        pwdElement.style.backgroundImage = "none";

        pwdDisplayElement.addEventListener('click', (e) => {
            pwdElement.setAttribute("type", "text")
            e.target.style.display = "none"
            pwdHidenElement.style.display = "block"
        })

        pwdHidenElement.addEventListener('click', (e) => {
            pwdElement.setAttribute("type", "password")
            e.target.style.display = "none"
            pwdDisplayElement.style.display = "block"
        })
    </script>
</body>

</html>