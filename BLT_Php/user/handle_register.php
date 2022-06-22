<?php
session_start();

$fullname = $username =  $email = $password = $confirmPassword = $phone_number = "";
$error = array();

$nameRegex = "/\b\S*[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Za-z]+\S*\b/";
$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$phoneRegex = "/^[0-9]{9,}$/";

if (!empty($_POST)) {
    $fullname = getPOST('fullname');
    $username = getPOST('username');
    $email = getPOST('email');
    $password = getPOST('password');
    $confirmPassword = getPOST('confirmPassword');
    $phone_number = getPOST('phone_number');

    if (!preg_match($nameRegex, $username)) {
        $error['username'] = "Tên cần ít nhất 8 ký tự và bắt đầu bằng chữ";
    }

    if (!preg_match($emailRegex, $email)) {
        $error['email'] = "Email phải có dạng a@gmail.com";
    } else {
        $sql = "SELECT * FROM user where email = '$email'";

        $result = executeResult($sql);
        if (!empty($result)) {
            $error['email'] = "Email đã tồn tại";
        }
    }

    if (!preg_match($passwordRegex, $password)) {
        $error['password'] = "Mật khẩu tối thiểu 8 ký tự, ít nhất một ký tự hoa, một ký tự viết thường, một số và một ký tự đặc biệt";
    }

    if ($password != $confirmPassword) {
        $error['confirmPassword'] = "Không trùng với mật khẩu";
    }

    if (!preg_match($phoneRegex, $phone_number)) {
        $error['phone_number'] = "Số điện thoại cần ít nhất 9 chữ số";
    }


    if (empty($error)) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['phone_number'] = $phone_number;

        date_default_timezone_set("Asia/Bangkok");
        $create_at = $update_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO user(fullname, username, email, phone_number, password, created_at, updated_at)
         VALUES ('$fullname','$username','$email','$phone_number','$password','$create_at','$update_at')";
        execute($sql);

        header("Location: index.php");
        die();
    }
}
