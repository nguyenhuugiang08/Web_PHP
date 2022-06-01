<?php
session_start();

$fullname = $username = $email = $password = $phone_number = '';

if (!empty($_POST)) {
    $fullname = getPOST('fullname');
    $username = getPOST('username');
    $email = getPOST('email');
    $password = getPOST('password');
    $phone_number = getPOST('phone_number');

    // var_dump($fullname , $username , $email , $password , $phone_number);

    if ($fullname != '' && $username != '' && $email != '' && $password != '' && $phone_number != '') {
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
