<?php
require_once('../database/dbhelper.php');
require_once('../utils/utility.php');
session_start();

if(!empty($_POST)){
    $action = getPOST('action');
    switch ($action) {
        case 'logout':
            unset($_SESSION['userId']);
            unset($_SESSION['cart']);
            $_SESSION['login'] = 'Failure';
            break;
        
    }
}