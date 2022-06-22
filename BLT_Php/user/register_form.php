<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
require_once('handle_register.php');

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
    <div class="overlay">
        <a class="overlay-return__home" href="../index.php">
            <i class="fa-solid fa-house-chimney-crack"></i> Trang chủ
        </a>
        <div class="register-form">
            <div class="heading">
                <h2>Đăng Ký</h2>
                <a href="index.php" class="login__link">Đăng Nhập</a>
            </div>
            <form class="row g-3 " method="post">
                <div class="col-md-12">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname ?>">
                    <div class="invalid-feedback">
                        Vui lòng nhập họ tên đầy đủ của bạn.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control <?= empty($error['username']) ? "" : 'is-invalid' ?>" id="username" aria-describedby="emailHelp" name="username" value="<?= $username ?>" />
                    <div class="invalid-feedback">
                        <?= empty($error['username']) ? "" : $error['username'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control <?= empty($error['email']) ? "" : 'is-invalid' ?>" id="email" aria-describedby="emailHelp" name="email" value="<?= $email ?>" />
                    <div class="invalid-feedback">
                        <?= empty($error['email']) ? "" : $error['email'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-group">
                        <input type="password" class="form-control <?= empty($error['password']) ? "" : 'is-invalid' ?>" id="password" name="password" value="<?= $password ?>" />
                        <i class="fa-solid fa-eye display-password"></i>
                        <i class="fa-solid fa-eye-slash hiden-password"></i>
                        <div class="invalid-feedback">
                            <?= empty($error['password']) ? "" : $error['password'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Xác minh mật khẩu</label>
                    <div class="password-group">
                        <input type="password" class="form-control <?= empty($error['confirmPassword']) ? "" : 'is-invalid' ?>" id="password" name="confirmPassword" value="<?= $confirmPassword ?>" />
                        <i class="fa-solid fa-eye display-password"></i>
                        <i class="fa-solid fa-eye-slash hiden-password"></i>
                        <div class="invalid-feedback">
                            <?= empty($error['confirmPassword']) ? "" : $error['confirmPassword'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-4">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control <?= empty($error['phone_number']) ? "" : 'is-invalid' ?>" id="phone" name="phone_number" value="<?= $phone_number ?>" />
                        <div class="invalid-feedback">
                            <?= empty($error['phone_number']) ? "" : $error['phone_number'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit">Đăng Ký</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let pwdElement = document.querySelectorAll('#password')
        let pwdDisplayElement = document.querySelectorAll('.display-password')
        let pwdHidenElement = document.querySelectorAll('.hiden-password')

        pwdElement.forEach(element => {
            element.style.backgroundImage = "none";
        });

        pwdDisplayElement.forEach((element, index) => {
            element.addEventListener('click', (e) => {
                pwdElement[index].setAttribute("type", "text")
                e.target.style.display = "none"
                pwdHidenElement[index].style.display = "block"
            })
        });

        pwdHidenElement.forEach((element, index) => {
            element.addEventListener('click', (e) => {
                pwdElement[index].setAttribute("type", "password")
                e.target.style.display = "none"
                pwdDisplayElement[index].style.display = "block"
            })
        });
    </script>
</body>

</html>