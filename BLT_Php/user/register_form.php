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
            <form class="row g-3 needs-validation" novalidate method="post">
                <div class="col-md-12">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname ?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập họ tên đầy đủ của bạn.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập username.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập Email.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <i class="fa-solid fa-eye display-password"></i>
                        <i class="fa-solid fa-eye-slash hiden-password"></i>
                        <div class="invalid-feedback">
                            Vui lòng nhập password.
                            <!-- <?= empty($error['pwd']) ? $error['pwd'] : "" ?> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="phone_number" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $phone_number ?>" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập số điện thoại của bạn.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit">Đăng Ký</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

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