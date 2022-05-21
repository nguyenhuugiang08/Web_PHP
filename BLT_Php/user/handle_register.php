<?php
session_start();

$fullname = $username = $email = $password = $phone_number = '';

if (!empty($_POST)) {
    $fullname = getPOST('fullname');
    $username = getPOST('username');
    $email = getPOST('email');
    $password = getPOST('password');
    $phone_number = getPOST('phone_number');

    if ($fullname != '' && $username != '' && $email != '' && $password != '' && $phone_number != '') {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['phone_number'] = $phone_number;

        $sql = "insert into users(fullname, username, email, password, phone_number)
        values ('$fullname','$username','$email','$password','$phone_number')";

        execute($sql);

        header("Location: index.php");
        die();
    }
}
