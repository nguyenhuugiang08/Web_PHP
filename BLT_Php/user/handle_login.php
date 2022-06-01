<?php
$email = $passwword = '';

$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

$error = [];
$check = false;

if (!empty($_POST)) {
    $email = getPOST('email');
    $password = getPOST('password');
    $remember = getPOST('checkbox_remember');

    // if(!preg_match($emailRegex, $email)){
    //     $error['email'] = "Email phải có dạng A@gmail.com.";
    // }
    // if(!preg_match($passwordRegex, $password)){
    //     $error['pwd'] = "Mật khẩu tối thiểu 8 ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt.";
    // }



    $sql = 'select *from user, role where email="' . $email . '" and password = "' . $password . '" and role.id = user.role_id';
    $user = executeResultOne($sql);
    if (isset($user['name']) && $user['name'] == "Admin") {
        header('Location: ../Admin/home/index.php');
        die();
    } else {
        if (isset($user['email']) && $user['email'] == $email && $user['password'] == $password) {
            setcookie('email', $email, time() + 30 * 24 * 60 * 60, '/');
            setcookie('password', $password, time() + 30 * 24 * 60 * 60, '/');
            if($remember == "checked"){
                setcookie('remember', $remember, time() + 30 * 24 * 60 * 60, '/');
            }else{
                setcookie('remember', "unchecked", time() + 30 * 24 * 60 * 60, '/');
            }
            header('Location: ../index.php');
            die();
        } else {
            echo '<script>alert("Sai mật khẩu hoặc email. Vui lòng nhập lại!")</script>';
        }
    }


}
