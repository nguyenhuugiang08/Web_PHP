<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

if (!empty($_POST)) {
    $action = getPOST('action');

    switch ($action) {
        case 'deleteProduct':
            $id = getPOST('id');
            $sql = "DELETE FROM products WHERE id = $id";
            execute($sql);
            break;
        case 'deleteUser':
            $id = getPOST('id');
            $sql = "DELETE FROM users WHERE id = $id";
            execute($sql);
            break;
    }
}
